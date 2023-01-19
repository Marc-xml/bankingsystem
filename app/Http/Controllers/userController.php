<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\contact_user;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    //
 public function redirect(){
    

    // for multi user 
    $usertype = Auth::user()->usertype;
    if($usertype=='1'){
      
        return view('admin.home');
    }else{
        return view('client.accounts');
    }
 }

 public function contact_user($id){
    session()->put("contact_id",$id);
    return view("admin.contact_user");
 }

 public function send_email(Request $request){
    $id = session()->get("contact_id");
    $user = User::find($id);
    $email = $user->email;
    $message = $request->content;
    session()->put('contact_message',$message);
    try{
        Mail::to($email)->send(new contact_user());
    }catch(\Throwable $e){
        return back()->with("message","messag not sent");
    }
    return back()->with("message","message sent");

 }
}
