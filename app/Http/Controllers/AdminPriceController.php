<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminPriceController extends Controller
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
        return view('admin.price.create', [
            'tickets' => Ticket::all()
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
            'ticket_id' => ['required'],
            'price' => ['required']
        ]);

        $validateSamePrice = Price::where('ticket_id', $validatedData['ticket_id'])->first();

        if ($validateSamePrice) {
            return redirect('/admin/prices/create')->with('samePrice', 'Prices dengan data tersebut sudah ada di database!')->withInput();
        }

        Price::create($validatedData);

        return redirect('/admin/prices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('admin.price.edit', [
            'price' => $price
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $validatedData = $request->validate([
            'price' => ['required']
        ]);

        $price->update($validatedData);

        return redirect('/admin/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}