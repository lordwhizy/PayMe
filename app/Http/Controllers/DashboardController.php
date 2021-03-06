<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {

        $payments = auth()->user()->payments()->orderBy('id', 'desc')->limit(10)->get();
        $stats = auth()->user()->getStats();

        return view('dashboard.index', ['payments' => $payments, 'stats' => $stats]);
    }
}
