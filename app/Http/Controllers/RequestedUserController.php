<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestedUserRequest;
use Gate;
use App\User;
use App\User_types;
use DB;
use App\User_type;
use Cache;
class RequestedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        
    }
    
    
     public function index()
    {
        $users =  User::NotAccepted()->paginate(20);
        return view('users.requestUsers', compact('users'));
    }   

    
     public function edit(User $user)
    {
        return view('users.editUserType', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestedUserRequest $request, User $user)
    {

        $user->type_id = (int) $request->selection;
        $user->id = $request->id;
        $user->salary = $request->salary;
        $user->accepted = 1;
        
        $user->save();
        return redirect('/requestedusers')->with('success', 'User has been Accepted.');
    }

}
