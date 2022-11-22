<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function index()
    {
        return view('customer.order.print');
    }

    public function print()
    {
        $pdf = PDF::loadview('customer.order.print')->setPaper('A4', 'potrait');
        return $pdf->stream('invoice.pdf');
    }
}
