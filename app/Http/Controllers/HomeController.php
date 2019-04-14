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
        $count = DB::table('addresses')->count();
//        dd($addresses);
        $data = array(
            'addresses' => $addresses,
            'count' => $count,
            'title' => 'Dashboard'
           );
        return view('home')->with($data);
    }
}
