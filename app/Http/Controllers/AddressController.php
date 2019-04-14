<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $level = Auth::user()->level;
        if ($level === 1){
            $data = array(
                'title' => 'Create'
            );
            return view('addresses/new')->with($data);
        } else {
            return redirect('/');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $level = Auth::user()->level;
        if ($level === 1){
            $validatedData = $request->validate([
                'building_number' => 'required|max:100',
                'street' => 'required|max:100',
                'city' => 'required|max:100',
                'state' => 'required|max:100',
                'country' => 'required|max:100',
                'zip' => 'required|max:5'
            ]);
            $building_number = $request->input('building_number');
            $street = $request->input('street');
            $city = $request->input('city');
            $state = $request->input('state');
            $country = $request->input('country');
            $zip = $request->input('zip');
            DB::table('addresses')->insert(
                ['building_number' => $building_number, 'street' => $street, 'city' => $city, 'state' => $state, 'country' => $country,
                    'zip' => $zip]
            );
            return redirect('/')->with('success', 'Address created.');
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $level = Auth::user()->level;
        if ($level === 1){
            $address = DB::select('select * from addresses where id = ?', array($id));
            if (empty($address)) {
                return view('404');
            }
            $data = array(
                'title' => 'Edit',
                'address' => $address
            );
            return view('addresses/edit')->with($data);
        } else {
            return redirect('/');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $level = Auth::user()->level;
        if ($level === 1){
            $address = DB::select('select * from addresses where id = ?', array($id));
            if (empty($address)) {
                return view('404');
            } else {
                $validatedData = $request->validate([
                    'building_number' => 'required|max:100',
                    'street' => 'required|max:100',
                    'city' => 'required|max:100',
                    'state' => 'required|max:100',
                    'country' => 'required|max:100',
                    'zip' => 'required|max:5'
                ]);
                $building_number = $request->input('building_number');
                $street = $request->input('street');
                $city = $request->input('city');
                $state = $request->input('state');
                $country = $request->input('country');
                $zip = $request->input('zip');
                DB::table('addresses')
                    ->where('id', $id)
                    ->update(['building_number' => $building_number, 'street' => $street, 'city' => $city, 'state' => $state, 'country' => $country, 'zip' => $zip]);
                return redirect('/')->with('success', 'Address edited.');

            }
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $level = Auth::user()->level;
        if ($level === 1){
            $address = DB::select('select * from addresses where id = ?', array($id));
            if (empty($address)) {
                return view('404');
            } else {
                DB::table('addresses')->where('id', '=', $id)->delete();
                return redirect('/')->with('success', 'Address deleted.');
            }
        } else {
            return redirect('/');
        }
    }
}
