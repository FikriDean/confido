<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function index()
    {
        return view('orders.print');
    }

    public function print()
    {
        $pdf = PDF::loadview('orders.print')->setPaper('A4', 'potrait');
        return $pdf->stream('invoice.pdf');
    }
}
