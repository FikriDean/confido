<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Order;
use App\Models\Transaction;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'tickets' => Ticket::all(),
            'orders' => Order::all(),
            'transactions' => Transaction::where('status', false)
        ]);
    }
}
