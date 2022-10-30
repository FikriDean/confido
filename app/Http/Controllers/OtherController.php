<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function checkprice(Request $request)
    {
        dd($request);
        return response()->json(['name' => 'test']);
    }
}
