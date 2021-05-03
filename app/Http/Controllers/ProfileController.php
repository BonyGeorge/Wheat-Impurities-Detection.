<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\pages;
use Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }


    public function index(){
    	$user = Auth::user()->id;
    	return view('pages.profile.profile',compact('user'));

    }


    public function show($id)
    {
        //
    }

    public function edit(Profile $profile)
    {
    	$user = Auth::user()->id;

            return view('pages.profile.editProfile',compact('user'));

    }


    public function update(Request $request,Profile $profile)
    {

        $image = $request->file('filename');
        if($image == NULL)
        {
       

            $profile::where('id', Auth::user()->id)->update([



                   'name'=> $request->name,
                   'email'=> $request->email,
                   'ssn'=> $request->ssn,
                   'birthday'=> $request->birthday,
                   'isMale'=> (int) $request->isMale,
                   'address'=> $request->address,
                   'email'=> $request->email,
                   'mobile'=> $request->phone,

              

            ]);
        }

        else {
        $extension = $image->getClientOriginalExtension();
        Storage::disk('ProfilePicture')->put($image->getFilename().'.'.$extension,  File::get($image));

       

            $profile::where('id',Auth::user()->id)->update([

                   'name'=> $request->name,
				   'email'=> $request->email,
			       'ssn'=> $request->ssn,
			       'birthday'=> $request->birthday,
			       'isMale'=> (int) $request->isMale,
			       'address'=> $request->address,
			       'email'=> $request->email,
			       'mobile'=> $request->phone,
                   'filename' => $image->getFilename().'.'.$extension,
       

            ]);
}
            return redirect('/profile')->with('success', 'profile Updated successfuly.');
    
        // dd($request);

    }

}



