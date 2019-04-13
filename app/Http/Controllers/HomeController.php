<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class HomeController extends Controller
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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $addresses = DB::select('SELECT * FROM addresses ORDER BY date_created DESC');
        $count = DB::select('SELECT count(*) as count FROM addresses');
        error_log('Some message here.');
        return view('home')->with('title', 'Dashboard');
    }
}
