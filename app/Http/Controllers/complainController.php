<?php

namespace App\Http\Controllers;
use App\Mail\reply_complain;
use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class complainController extends Controller
{
    //
    public function new_complain(Request $request){
        $complain = new Complain;
        $complain->title = $request->title;
        $complain->content = $request->content;
        $complain->email = $request->email;
        $complain->status = "unsolved";
        $complain->complainer = auth()->user()->id;
        try{
            $complain->save();
            return back()->with("message","complain submited succesfully, we will review you complain anmd contact you later");

        }catch(\Throwable $e){
            return back()->with("message","an error occured please try again");
        }
    }
    // all complains 
    public function all_complains(){
        $complains = Complain::all();
        return view('admin.complains',compact("complains"));
    }
    public function complain_detail($id){
        $complain = Complain::find($id);
        return view("admin.complain_detail",compact("complain"));
    }
    // reply to customer comlain 
    public function reply_complain(Request $request,$id){
        $complain = complain::find($id);
        $complain->status = "solved";
        $complain->reply = $request->reply;
        session()->put("complain_reply",$complain);
        Mail::to($complain->email)->send(new reply_complain);
        $complain->update();
        return back()->with("message","reply was sent");
    }
    // delete complains 
    public function delete_complain($id){
        $complain = Complain::find($id);
        $complain->delete();
        return back()->with("message","Complain deleted");
    }
}
