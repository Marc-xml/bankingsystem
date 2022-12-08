<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    //
    public function all_messages(){
        $messages = Message::all();
        session()->put('messages',$messages);
        // return view('client.message',compact('messages'));

    }
    public function send_message(Request $request){
        
        $message = new Message;
        $message->content = $request->content;
        $message->save();
        

         return back()->with('message','Message sent');
    }
}
