<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::where('order_code', $request['order'])->first();
        return view('customer.order.print', [
            'order' => $order
        ]);
    }

    public function print()
    {
        $pdf = PDF::loadview('customer.order.print')->setPaper('A4', 'potrait');
        return $pdf->stream('invoice.pdf');
    }
}
