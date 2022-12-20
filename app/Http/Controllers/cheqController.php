<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use Illuminate\Http\Request;

class cheqController extends Controller
{
    //
    public function new_cheq(Request $request){
        // all chequest 
        $account = session()->get('acc');
        $cheques = Cheque::Latest()->where('account_number','=',"$account")->get();
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
            }catch(\Throwable $e){
                return back()->with('message','An erro occured please try again');
            }

        
        return view('client.chechreq',compact('cheques'))->with('message','Checbook request submitted succesfully');
    }
}
