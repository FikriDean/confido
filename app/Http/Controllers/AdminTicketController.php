<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Airline;
use App\Models\Type;
use App\Models\Track;

use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.create', [
            'airlines' => Airline::all(),
            'types' => Type::all(),
            'tracks' => Track::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'airline_id' => ['required'],
            'type_id' => ['required'],
            'track_id' => ['required']
        ]);

        $validateSameTicket = Ticket::where('airline_id', $validatedData['airline_id'])->where('type_id', $validatedData['type_id'])->where('type_id',  $validatedData['type_id'])->first();

        if ($validateSameTicket) {
            return redirect('/admin/ticket/create')->with('sameTicket', 'Ticket dengan data tersebut sudah ada di database!')->withInput();
        }

        Ticket::create($validatedData);

        return redirect('/admin/ticket');
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
}
