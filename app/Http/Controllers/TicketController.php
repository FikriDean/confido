<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Airline;
use App\Models\Type;
use App\Models\Method;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Ticket::latest());
        return view('customer.ticket.index', [
            'tickets' => Ticket::latest()->filter(request(['airline_id'])),
            'routes' => Track::all(),
            'airlines' => Airline::all(),
            'types' => Type::all(),
            'methods' => Method::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function checktickets(Request $request)
    {
        // if (!$request['from_route']) {
        //     return response()->json(['price' => 'You must to select your pickup location!']);
        // } else {
        //     $from_route = $request['from_route'];
        // }

        // if (!$request['to_route']) {
        //     return response()->json(['price' => 'You must to select your destination location!']);
        // } else {
        //     $to_route = $request['to_route'];
        // }

        // if (!$request['airline_id']) {
        //     return response()->json(['price' => 'You must to select airline!']);
        // } else {
        //     $airline_id = $request['airline_id'];
        // }

        // if (!$request['type_id']) {
        //     return response()->json(['price' => 'You must to select type of airline!']);
        // } else {
        //     $type_id = $request['type_id'];
        // }

        // // Validasi rute sama
        // if ($from_route == $to_route) {
        //     return response()->json(['price' => 'You cannot choose same location for pickup and destination']);
        // }

        // $track_id = Track::where('from_route', $from_route)->where('to_route', $to_route)->first()->id;

        // $ticketsold = Ticket::all()->where('airline_id', 1)->orWhere('type_id', 1)->orWhere('track_id', 1)->get();

        // $tickets = Ticket::select('airline_id', 'type_id')->where(function ($query) {
        //     $query->where('airline_id', '=', 1)
        //         ->orWhere('type_id', '=', 10);
        // })->get();

        $tickets = Ticket::whereHas('airline', function ($q) {
            $q->where('airline_id', 1);
        })->get();


        // Return <JSON></JSON>
        return [
            'tickets' => $tickets
        ];
    }
}
