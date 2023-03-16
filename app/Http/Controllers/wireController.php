<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Wire;
use App\Models\Message;
use App\Mail\verifyWire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $wires = Wire::where("account_concerned","=",$account)->where(function($query){
            $query->where("status","=","unverified");
        })->get();
        if(count($wires) >0){
            return back()->with("message","Already have a pending transfer");
        }
            try
            {
         $wire->save();
            }
            catch(\throwable $e)
            {
         return back()->with("message","An error occured  please try again");
            }
         return redirect('/verify-wire')->with("message","Please verify the transaction");
         session()->put("account",$account);
         session()->put("amount",$request->amount);
         session()->put("receiver",$request->account_number);
    }

    public function show(){
        $account = session()->get('acc');
        $transfers = Wire::Latest()->get();
        $messages = DB::table('messages')
        ->where("sender","=",auth()->user()->id)->get();
      session()->put('mss',$messages);
        return view('client.wire',compact('transfers'));
    }
    
    public function delete_transfer($id){
        $transfer = Wire::find($id);
        $transfer->delete();
        return back()->with("message","Transaction cancelled");
    }
    public function verify_wire(){
        function generate_otp($n){
            $gen = "1357902468";
            $res = "";
            for ($i = 1; $i <= $n; $i++)
         {
            $res .= substr($gen, (rand()%(strlen($gen))), 1);
         }
            return $res;
         }
         $otp = generate_otp(6);
         session()->put('otp',$otp);    

         try{
         Mail::to(auth()->user()->email)->send(new verifyWire());
         }catch(\Throwable $e){
            return back()->with("message","check your internet connection");
         }
         return view("client.confirm_wire")->with("message","Please check your emails for the verification code ");
    }
    public function confirm_wire(Request $request){
        $otp = session()->get('otp');
        if($otp == $request->otp){
            $account = session()->get('account');
            $wires = Wire::where("account_concerned","=",$account)->where(function($query){
                $query->where("status","=","unverified");
            })->get();
            
            $wires->status = "verified";
                try{
            $wires->save();

                }catch(\Throwable $e){
                    return back()->with("message","an error occured");
                }
                return redirect('/loans')->with("message","Loan verification complete");
        }else{
            return back()->with("message","Incorrect otp code");
        }

    }
}
