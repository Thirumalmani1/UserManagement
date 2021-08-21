<?php

namespace App\Http\Controllers;

use App\users_info;
use Illuminate\Http\Request;
use Validator;
use DB;

class UsersInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersList= users_info::all();
        return view('index',compact('usersList'));
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
        try {
            $validator = Validator::make($request->all(), [
            'name' => 'required|max:50:unique',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'country' => 'required|max:20',
            'date' => 'required|date',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            $user= new users_info;
            $user->name=$request->get('name');
            $user->email=$request->get('email');
            $user->phone_number=$request->get('number');
            $user->date_of_birth = $request->get('date');
            $user->country=$request->get('country');
            $user->save();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
        return redirect('/users_info/index')->with('success', 'User information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users_info  $users_info
     * @return \Illuminate\Http\Response
     */
    public function show(users_info $users_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users_info  $users_info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = users_info::find($id);
        return view('edit',compact('user','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users_info  $users_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|max:50:unique',
        'email' => 'required|email',
        'number' => 'required|numeric',
        'country' => 'required|max:20',
        'date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $user = users_info::find($request->get('id'));
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->phone_number=$request->get('number');
        $user->country=$request->get('country');
        $user->date_of_birth=$request->get('date');
        $user->save();
        return redirect('/users_info/index')->with('success', 'User information has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users_info  $users_info
     * @return \Illuminate\Http\Response
     */
    
    public function delete($id)
    {
        $user = users_info::find($id);
        $user->delete();
        return redirect('/users_info/index')->with('success', 'User information has been deleted');
    }
}
