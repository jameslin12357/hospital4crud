<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
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
        $user = DB::select('select id, name, email, created_at, description, imageurl from users where id = ?', array($id));
        if (empty($user)) {
            return view('404');
        }
        $data = array(
            'title' => 'Profile',
            'user' => $user
        );
        return view('users/show')->with($data);
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
            $user = DB::select('select id, name, email, created_at, description, imageurl from users where id = ?', array($id));
            if (empty($user)) {
                return view('404');
            }
            $userid = Auth::id();
            if ($userid != $id){
                return redirect('/');
            } else {
                $data = array(
                    'title' => 'Edit',
                    'user' => $user
                );
                return view('users/edit')->with($data);
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
        $user = DB::select('select id, name, email, created_at, description, imageurl from users where id = ?', array($id));
        if (empty($user)) {
            return view('404');
        }
        $userid = Auth::id();
        if ($userid != $id){
            return redirect('/');
        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'description' => 'required'
            ]);
            $name = $request->input('name');
            $email = $request->input('email');
            $description = $request->input('description');
            DB::table('users')
                ->where('id', $id)
                ->update(['name' => $name, 'email' => $email, 'description' => $description]);
            return redirect('/users/' . $userid)->with('success', 'User edited.');
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
        $user = DB::select('select id, name, email, created_at, description, imageurl from users where id = ?', array($id));
        if (empty($user)) {
            return view('404');
        }
        $userid = Auth::id();
        if ($userid != $id){
            return redirect('/');
        } else {
            DB::table('users')->where('id', '=', $id)->delete();
        }
    }
}
