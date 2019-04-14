<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MedicationController extends Controller
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
        $medications = DB::select('SELECT * FROM medications ORDER BY date_created DESC');
        $count = DB::table('medications')->count();
        $data = array(
            'medications' => $medications,
            'count' => $count,
            'title' => 'Medications'
        );
        return view('medications/index')->with($data);
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
            return view('medications/new')->with($data);
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
                'name' => 'required|max:100',
                'description' => 'required',
                'cost' => 'required'
            ]);
            $name = $request->input('name');
            $description = $request->input('description');
            $cost = $request->input('cost');
            DB::table('medications')->insert(
                ['name' => $name,'description' => $description, 'cost' => $cost]
            );
            return redirect('/medications')->with('success', 'Medication created.');
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
            $medication = DB::select('select * from medications where id = ?', array($id));
            if (empty($medication)) {
                return view('404');
            }
            $data = array(
                'title' => 'Edit',
                'medication' => $medication
            );
            return view('medications/edit')->with($data);
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
            $medication = DB::select('select * from medications where id = ?', array($id));
            if (empty($medication)) {
                return view('404');
            } else {
                $validatedData = $request->validate([
                    'name' => 'required|max:100',
                    'description' => 'required',
                    'cost' => 'required'
                ]);
                $name = $request->input('name');
                $description = $request->input('description');
                $cost = $request->input('cost');
                DB::table('medications')
                    ->where('id', $id)
                    ->update(['name' => $name, 'description' => $description, 'cost' => $cost]);
                return redirect('/medications')->with('success', 'Medication edited.');

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
            $medication = DB::select('select * from medications where id = ?', array($id));
            if (empty($medication)) {
                return view('404');
            } else {
                DB::table('medications')->where('id', '=', $id)->delete();
                return redirect('/medications')->with('success', 'Medication deleted.');
            }
        } else {
            return redirect('/');
        }
    }
}
