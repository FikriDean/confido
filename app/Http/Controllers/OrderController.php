<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Track;
use App\Models\Airline;
use App\Models\Type;
use App\Models\Method;
use App\Models\Ticket;
use App\Models\Transaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.order.index', [
            'orders' => Order::all()->where('user_id', Auth::id())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customer.order.create", [
            "routes" => Track::all(),
            'airlines' => Airline::all(),
            'types' => Type::all(),
            'tickets' => Ticket::all(),
            'methods' => Method::all()
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
        $validatedDataOrder = $request->validate([
            'from_route' => ['required'],
            'to_route' => ['required'],
            'airline_id' => ['required'],
            'type_id' => ['required'],
            'round_trip' => ['required'],
            'amount' => ['required', 'max:5'],
            'go_date' => ['required'],
            'return_date' => [],
        ]);

        if ($validatedDataOrder['round_trip'] == "true") {
            $validatedDataOrder['round_trip'] = true;
        } else {
            $validatedDataOrder['round_trip'] = false;
        }

        $validatedDataOrder['user_id'] = auth()->user()->id;
        $order_code1 = strval(number_format(microtime(true) * 1000, 0, '.', ''));
        $validatedDataOrder['order_code'] = $order_code1;

        $from_route = $request['from_route'];
        $to_route = $request['to_route'];
        $airline_id = $request['airline_id'];
        $type_id = $request['type_id'];

        $track_id = Track::where('from_route', $from_route)->where('to_route', $to_route)->first()->id;

        $validatedDataOrder['ticket_id'] = Ticket::where('airline_id', $airline_id)->where('type_id', $type_id)->where('track_id', $track_id)->first()->id;

        Order::create($validatedDataOrder);

        // Transaction 1

        $validatedDataTransaction = $request->validate([
            'method_id' => ['required'],
            'name_account' => ['required'],
            'from_account' => ['required']
        ]);

        $order1 = Order::where('order_code', $order_code1)->first();

        $validatedDataTransaction['order_id'] = $order1->id;

        $validatedDataTransaction['total'] = $order1->ticket->price->price * $validatedDataOrder['amount'];

        $validatedDataTransaction['status'] = false;

        Transaction::create($validatedDataTransaction);

        sleep(1);

        if ($validatedDataOrder['round_trip'] == true) {
            $validatedDataOrder2 = $request->validate([
                'from_route' => ['required'],
                'to_route' => ['required'],
                'airline_id' => ['required'],
                'type_id' => ['required'],
                'round_trip' => ['required'],
                'amount' => ['required', 'max:5'],
                'go_date' => ['required'],
                'return_date' => [],
            ]);

            if ($validatedDataOrder2['round_trip'] == "true") {
                $validatedDataOrder2['round_trip'] = true;
            } else {
                $validatedDataOrder2['round_trip'] = false;
            }

            $validatedDataOrder2['user_id'] = auth()->user()->id;
            $order_code2 = strval(number_format(microtime(true) * 1000, 0, '.', ''));
            $validatedDataOrder2['order_code'] = $order_code2;

            $from_route = $request['to_route'];
            $to_route = $request['from_route'];
            $airline_id = $request['airline_id'];
            $type_id = $request['type_id'];

            $track_id = Track::where('from_route', $from_route)->where('to_route', $to_route)->first()->id;

            $validatedDataOrder2['ticket_id'] = Ticket::where('airline_id', $airline_id)->where('type_id', $type_id)->where('track_id', $track_id)->first()->id;

            Order::create($validatedDataOrder2);

            $validatedDataTransaction2 = $request->validate([
                'method_id' => ['required'],
                'name_account' => ['required'],
                'from_account' => ['required']
            ]);

            $order2 = Order::where('order_code', $order_code2)->first();

            $validatedDataTransaction2['order_id'] = $order2->id;

            $validatedDataTransaction2['total'] = $order2->ticket->price->price * $validatedDataOrder['amount'];

            $validatedDataTransaction2['status'] = false;

            Transaction::create($validatedDataTransaction2);
        }

        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function checkprice(Request $request)
    {
        // if (!$request['airline'] || !$request['type'] || $request['pickup'] || $request['destination']) {
        //     return response()->json(['price' => "Select Airline, Type, Pickup, and Destination first"]);
        // }

        // Validasi ketersediaan value
        if (!$request['from_route']) {
            return response()->json(['price' => 'You must to select your pickup location!']);
        } else {
            $from_route = $request['from_route'];
        }

        if (!$request['to_route']) {
            return response()->json(['price' => 'You must to select your destination location!']);
        } else {
            $to_route = $request['to_route'];
        }

        if (!$request['airline_id']) {
            return response()->json(['price' => 'You must to select airline!']);
        } else {
            $airline_id = $request['airline_id'];
        }

        if (!$request['type_id']) {
            return response()->json(['price' => 'You must to select type of airline!']);
        } else {
            $type_id = $request['type_id'];
        }

        // Validasi rute sama
        if ($from_route == $to_route) {
            return response()->json(['price' => 'You cannot choose same location for pickup and destination']);
        }

        $track_id = Track::where('from_route', $from_route)->where('to_route', $to_route)->first()->id;



        // Validasi belum jadi
        if ($track_id == null) {
            return response()->json(['price' => 'Ticket Not Found!']);
        }

        $price = Ticket::all()->where('airline_id', $airline_id)->where('type_id', $type_id)->where('track_id', $track_id)->first()->price->price;
        // Validasi belum jadi
        if ($price == null) {
            return response()->json(['price' => 'Ticket Not Found!']);
        }

        // Return JSON
        return response()->json(['price' => $price]);
    }
}
