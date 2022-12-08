<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Wire;
use Illuminate\Http\Request;

class wireController extends Controller
{
    //
    
    public function initiate_transfer(Request $request){
        $account = session()->get('acc');
        $date = Carbon::now();
        // $initiate = $request->validate([
        //     'beneficiary'=>'required',
        //      'account_number'=>'required',
        //      'bic_code'=>'required',
        //      'clearing_code'=>'required',
        //      'bank_name'=>'required',
        //      'amount'=>'required',
        //      'message',
        //      'date'=>"required",
        //      'status',
        //      'account_concerned'=>'required'

        // ]);
        $wire = new Wire;
        $wire->beneficiary = $request->beneficiary;
        $wire->account_number = $request->account_number;
        $wire->bic_code = $request->bic_code;
        $wire->clearing_code = $request->clearing_code;
        $wire->bank_name = $request->bank_name;
        $wire->amount = $request->amount;
        $wire->message = $request->message;
        $wire->status = 'unverified';
        $wire->account_concerned = $account;
            try
            {
         $wire->save();
            }
            catch(\throwable $e)
            {
         return back()->with("message","An error occured  please try again");
            }
         return back()->with("message","Transaction initaited");
    }

    public function show(){
        $account = session()->get('acc');
        $transfers = Wire::Latest()->get();
        return view('client.wire',compact('transfers'));
    }
    
    public function delete_transfer($id){
        $transfer = Wire::find($id);
        $transfer->delete();
        return back()->with("message","Transaction cancelled");
    }
}
