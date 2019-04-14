<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class VisitController extends Controller
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
        $visits = DB::select('SELECT * FROM visits ORDER BY date_created DESC');
        $count = DB::table('visits')->count();
        $data = array(
            'visits' => $visits,
            'count' => $count,
            'title' => 'Visits'
        );
        return view('visits/index')->with($data);

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
            return view('visits/new')->with($data);
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
                'patient_id' => 'required',
                'doctor_id' => 'required'
            ]);
            $patient_id = $request->input('patient_id');
            $doctor_id = $request->input('doctor_id');
            DB::table('visits')->insert(
                ['patient_id' => $patient_id,'doctor_id' => $doctor_id]
            );
            return redirect('/visits')->with('success', 'Visit created.');
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
            $visit = DB::select('select * from visits where id = ?', array($id));
            if (empty($visit)) {
                return view('404');
            }
            $data = array(
                'title' => 'Edit',
                'visit' => $visit
            );
            return view('visits/edit')->with($data);
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
            $visit = DB::select('select * from visits where id = ?', array($id));
            if (empty($visit)) {
                return view('404');
            } else {
                $validatedData = $request->validate([
                    'patient_id' => 'required',
                    'doctor_id' => 'required'
                ]);
                $patient_id = $request->input('patient_id');
                $doctor_id = $request->input('doctor_id');
                DB::table('visits')
                    ->where('id', $id)
                    ->update(['patient_id' => $patient_id, 'doctor_id' => $doctor_id]);
                return redirect('/visits')->with('success', 'Visit edited.');

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
            $visit = DB::select('select * from visits where id = ?', array($id));
            if (empty($visit)) {
                return view('404');
            } else {
                DB::table('visits')->where('id', '=', $id)->delete();
                return redirect('/visits')->with('success', 'Visit deleted.');
            }
        } else {
            return redirect('/');
        }
    }
}
