<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    //
    public function all_messages(){
        $messages = Message::all()
        ->where("sender","=",auth()->user()->id)
        ->where(function($query){
            $query->where("status","=","answered");
        });
        // ->where();
        session()->put('messages',$messages);
        // return view('client.message',compact('messages'));

    }
    public function send_message(Request $request){
        $user = auth()->user()->id;
        $message = new Message;
        $message->content = $request->content;
        $message->sender = $user;
        $message->receiver = 1;
        $message->status = "unanswered";
        $message->reply = "Thank you for messaging us, you will soon receive a response from us";
        $message->save();

         return back()->with('message','Message sent');
    }
    public function admin_messages(){
        $messages = Message::all()->where("status","=","unanswered");
        
        
        return view("admin.messages",compact("messages"));
    }
    public function filter_messages(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $user = auth()->user()->id;
        if(!empty($filter)){
       
            $messages =  Message::latest()
            ->where('id','like','%'.$filter.'%')
            ->orwhere('sender','like','%'.$filter.'%')
            ->orwhere('receiver','like','%'.$filter.'%')
            ->orwhere('content','like','%'.$filter.'%')
            ->orwhere('created_at','like','%'.$filter.'%')
            ->orwhere('status','like','%'.$filter.'%')
            ->get();
        }
        elseif (!empty($date)) {
            // $accounts = Message::all()->where('id','=',"$user");
            $messages = Message::latest()->where('created_at','like','%'.$date.'%')->get();
        
            
        }
        else{
           
            $messages = Message::all()
            ->where('status','=',"unanswered");
        }
        return view("admin.messages",compact("messages"));
     
    }
    public function reply_message($id){
        $message = Message::find($id);
        return view("admin.reply_message",compact("message"));
    }
    public function send_reply(Request $request,$id){
        $message = Message::find($id);
        $message->status = "answered";
        $message->reply = $request->reply;
        
        try{
           $message->update();
            return back()->with("message","Message sent");
        }catch(\Throwable $e){
            return back()->with("message","Message not sent please try again");
        }
        

    }
    public function delete_message($id){
        $message = Message::find($id);
        try{
            $message->delete();
             return back()->with("message","Message Deleted");
         }catch(\Throwable $e){
             return back()->with("message","Message not deleted please try again");
         }
    }
}
