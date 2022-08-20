<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('index', ['records' => auth()->user()->records()->with('people')->orderByDesc('created_at')->paginate(10)]);
    }
}
