<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Message;
use Illuminate\Http\Request;

class cheqController extends Controller
{
    //
    public function new_cheq(Request $request){
        $messages = Message::all()->
        where("sender","=",auth()->user()->id);
        $request->session()->put("mss",$messages);
        // all chequest 
        $account = session()->get('acc');
        $cheques = Cheque::Latest()->where('account_number','=',"$account")->get();
        if(count($cheques) >= 3){
            return back()->with('message',"you have attained your maximum number cheques you can request");
        }
        $cheq = new Cheque;
        $cheq->date = $request->date;
        $cheq->pages = $request->leaves;
        $cheq->account_number = $request->account;
        $cheq->currency = $request->currency;
        $cheq->address1 = $request->add1;
        $cheq->address2 = $request->add2;
        $cheq->collection = $request->method;

        if($account !== $request->account){

            return back()->with("message","Enter your correct account number");
        }
       try{
        $cheq->save();
        return back()->with('message',"Checkbook request submitted");
       }catch(\Throwable $e){
        return back()->with("message","An error occured please try again");
       }
        
  
        // return view('client.chechreq',compact('cheques'))->with('message','Checbook request submitted succesfully');
    }
    public function delete_cheque($id){
        $cheque = Cheque::find($id);
        try{
            $cheque->delete();
            return back()->with("message","Checkbook deleted");
        }catch(\throwable $e){
            return back()->with("message","An error occured try again");

        }
    }
}
