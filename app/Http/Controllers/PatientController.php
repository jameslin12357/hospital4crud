<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PatientController extends Controller
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
        $patients = DB::select('SELECT * FROM patients ORDER BY date_created DESC');
        $count = DB::table('patients')->count();
        $data = array(
            'patients' => $patients,
            'count' => $count,
            'title' => 'Patients'
        );
        return view('patients/index')->with($data);
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
            return view('patients/new')->with($data);
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
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'age' => 'required',
                'dob' => 'required',
                'email' => 'required|max:200',
                'phone_number' => 'required|max:10',
                'gender_id' => 'required',
                'address_id' => 'required'
            ]);
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $age = $request->input('age');
            $dob = $request->input('dob');
            $email = $request->input('email');
            $phone_number = $request->input('phone_number');
            $gender_id = $request->input('gender_id');
            $address_id = $request->input('address_id');
            DB::table('patients')->insert(
                ['first_name' => $first_name, 'last_name' => $last_name, 'age' => $age, 'dob' => $dob, 'email' => $email,
                    'phone_number' => $phone_number,'gender_id' => $gender_id,'address_id' => $address_id]
            );
            return redirect('/patients')->with('success', 'Patient created.');
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
            $patient = DB::select('select * from patients where id = ?', array($id));
            if (empty($patient)) {
                return view('404');
            }
            $data = array(
                'title' => 'Edit',
                'patient' => $patient
            );
            return view('patients/edit')->with($data);
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
            $patient = DB::select('select * from patients where id = ?', array($id));
            if (empty($patient)) {
                return view('404');
            } else {
                $validatedData = $request->validate([
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'age' => 'required',
                    'dob' => 'required',
                    'email' => 'required|max:200',
                    'phone_number' => 'required|max:10',
                    'gender_id' => 'required',
                    'address_id' => 'required'
                ]);
                $first_name = $request->input('first_name');
                $last_name = $request->input('last_name');
                $age = $request->input('age');
                $dob = $request->input('dob');
                $email = $request->input('email');
                $phone_number = $request->input('phone_number');
                $gender_id = $request->input('gender_id');
                $address_id = $request->input('address_id');
                DB::table('patients')
                    ->where('id', $id)
                    ->update(['first_name' => $first_name, 'last_name' => $last_name, 'age' => $age, 'dob' => $dob, 'email' => $email, 'phone_number' => $phone_number,'gender_id' => $gender_id,'address_id' => $address_id]);
                return redirect('/patients')->with('success', 'Patient edited.');

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
            $patient = DB::select('select * from patients where id = ?', array($id));
            if (empty($patient)) {
                return view('404');
            } else {
                DB::table('patients')->where('id', '=', $id)->delete();
                return redirect('/patients')->with('success', 'Patient deleted.');
            }
        } else {
            return redirect('/');
        }
    }
}
