<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = auth()->user()->clients()->distinct()->with('records')->get();

        return view('client.index', compact('clients'));
    }
}
