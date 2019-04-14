<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class GenderController extends Controller
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
        $genders = DB::select('SELECT * FROM genders ORDER BY date_created DESC');
        $count = DB::table('genders')->count();
        $data = array(
            'genders' => $genders,
            'count' => $count,
            'title' => 'Genders'
        );
        return view('genders/index')->with($data);
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
            return view('genders/new')->with($data);
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
                'gender' => 'required|max:1'
            ]);
            $gender = $request->input('gender');
            DB::table('genders')->insert(
                ['gender' => $gender]
            );
            return redirect('/genders')->with('success', 'Gender created.');
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
            $gender = DB::select('select * from genders where id = ?', array($id));
            if (empty($gender)) {
                return view('404');
            }
            $data = array(
                'title' => 'Edit',
                'gender' => $gender
            );
            return view('genders/edit')->with($data);
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
            $gender = DB::select('select * from genders where id = ?', array($id));
            if (empty($gender)) {
                return view('404');
            } else {
                $validatedData = $request->validate([
                    'gender' => 'required|max:1'
                ]);
                $gender = $request->input('gender');
                DB::table('genders')
                    ->where('id', $id)
                    ->update(['gender' => $gender]);
                return redirect('/genders')->with('success', 'Gender edited.');

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
            $gender = DB::select('select * from genders where id = ?', array($id));
            if (empty($gender)) {
                return view('404');
            } else {
                DB::table('genders')->where('id', '=', $id)->delete();
                return redirect('/genders')->with('success', 'Gender deleted.');
            }
        } else {
            return redirect('/');
        }
    }
}
