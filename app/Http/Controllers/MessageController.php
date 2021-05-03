<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\MessageRequest;
class MessageController extends Controller
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
        $messages = Message::all();
        return view('pages.messages.viewMsg', compact('messages'));
    }

    public function store(MessageRequest $request)
    {
       
            $Message = new Message;

            $Message->name = $request->name;
            $Message->email = $request->email;
            $Message->subject = $request->subject;
            $Message->message = $request->message;
        
        
            $Message->save();

            return back()->with('success', 'Message has been sent.'); 
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Message has been deleted.');
    }
}
