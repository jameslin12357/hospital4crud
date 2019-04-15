<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VisitsproceduresController extends Controller
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
        $visitsprocedures = DB::select('SELECT * FROM visitsprocedures ORDER BY date_created DESC');
        $count = DB::table('visitsprocedures')->count();
        $data = array(
            'visitsprocedures' => $visitsprocedures,
            'count' => $count,
            'title' => 'Visitsprocedures'
        );
        return view('visitsprocedures/index')->with($data);
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
            return view('visitsprocedures/new')->with($data);
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
                'visit_id' => 'required',
                'procedure_id' => 'required'
            ]);
            $visit_id = $request->input('visit_id');
            $procedure_id = $request->input('procedure_id');
            DB::table('visitsprocedures')->insert(
                ['visit_id' => $visit_id,'procedure_id' => $procedure_id]
            );
            return redirect('/visitsprocedures')->with('success', 'Visitprocedure created.');
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
            $visitprocedure = DB::select('select * from visitsprocedures where id = ?', array($id));
            if (empty($visitprocedure)) {
                return view('404');
            }
            $data = array(
                'title' => 'Edit',
                'visitprocedure' => $visitprocedure
            );
            return view('visitsprocedures/edit')->with($data);
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
            $visitprocedure = DB::select('select * from visitsprocedures where id = ?', array($id));
            if (empty($visitprocedure)) {
                return view('404');
            } else {
                $validatedData = $request->validate([
                    'visit_id' => 'required',
                    'procedure_id' => 'required'
                ]);
                $visit_id = $request->input('visit_id');
                $procedure_id = $request->input('procedure_id');
                DB::table('visitsprocedures')
                    ->where('id', $id)
                    ->update(['visit_id' => $visit_id, 'procedure_id' => $procedure_id]);
                return redirect('/visitsprocedures')->with('success', 'Visitprocedure edited.');

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
            $visitprocedure = DB::select('select * from visitsprocedures where id = ?', array($id));
            if (empty($visitprocedure)) {
                return view('404');
            } else {
                DB::table('visitsprocedures')->where('id', '=', $id)->delete();
                return redirect('/visitsprocedures')->with('success', 'Visitprocedure deleted.');
            }
        } else {
            return redirect('/');
        }
    }
}
