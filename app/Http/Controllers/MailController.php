<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Mail;

use App\User;
use Auth;
use App\Mail\Mailing;

class MailController extends Controller
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
        $users = User::pluck('email');
        return view('pages.sendmail', compact('users'));
    }

    

    public function mail (MailRequest $mail)
    {


                $user = Auth::user();
                $MailData = 
                [
                    'user' => $user ,
                    'mailsubject' => $mail['mailsubject'] ,
                    'mailcontent' => $mail['mailcontent'] ,
                    'selection' => $mail['selection']
                ];
                
        
                $user = User::findOrFail($mail['selection']);
        
                Mail::send('mails.custommail', $MailData, function($message) use($user){
                    $message->to($user->email, Auth::user()->name)->subject('Important Mail');
                });	
        
                return back()->with('success', 'Mail has been sent.');
        
        
    }
}