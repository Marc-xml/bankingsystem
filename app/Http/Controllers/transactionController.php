<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\verifyTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class transactionController extends Controller
{
    public function show(){

        $user =auth()->user()->id;
        $id = 2 ;
        // $request->session()->put('acc',$id);
        $accounts = Account::all()
        ->where('owner_id','=',"$user");
        $transactions = Transaction::latest()
         ->where('sender_account','=',"$id")
        ->orwhere('receiver_account','=',"$id")
       ->get();
    //    $pending = Transaction::all()->where('status','=','pending');
    //    $transactions = Transaction::where('sender_account','=',"$id")->where(
    //     function($query){
    //         $query->where("status","=","pending");
    //     }
    //    )->get();


    //    $transactionsids = $transactions->pluck('id')->toArray();
    //    $tranId = $transactionsids['0'];
       session()->put('tranid',$transactions);
        return view('client.transfer',compact('accounts'),compact('transactions'));
    }

    public function choose(Request $request ,$id){
        $user = auth()->user()->id;
        $accounts = Account::all()
        ->where('owner_id','=',"$user");
        $request->session()->put('acc',$id);
    
        $transactions = Transaction::latest()
        ->where('sender_account','=',"$id")
        ->orwhere('receiver_account','=',"$id")
       ->get();
       
        
    //    $messages = DB::table('messages')->get();
        
        return view('client.transfer',compact('accounts'),compact('transactions'),$id);
    }
    public function filtertrans(Request $request,$id){
            $filter = $request->query('search');
            $date = $request->query('date');
            $amount = $request->query('amount');
            $user = auth()->user()->id;
            if(!empty($filter)){
                $accounts = Account::all()
                ->where('owner_id','=',"$user");
                $transactions =  Transaction::latest()
                ->where('id','like','%'.$filter.'%')
                ->orwhere('sender_account','like','%'.$filter.'%')
                ->orwhere('receiver_account','like','%'.$filter.'%')
                ->orwhere('amount','like','%'.$filter.'%')
                ->orwhere('created_at','like','%'.$filter.'%')
                ->orwhere('status','like','%'.$filter.'%')
                ->get();
            }
            elseif (!empty($date)) {
                $accounts = Account::all()->where('owner_id','=',"$user");
                $transactions = Transaction::latest()->where('created_at','like','%'.$date.'%')->get();
            
                
            }elseif (!empty($amount)){
                $accounts = Account::all()->where('owner_id','=',"$user");
                $transactions  = Transaction::latest()->where('amount','=',"$amount")->get();
            }
            else{
               
                $accounts = Account::all()
                ->where('owner_id','=',"$user");
                $transactions = Transaction::latest()
                ->where('sender_account','=',"$id")
                ->orwhere('receiver_account','=',"$id")
               ->get();
            }
         
            return view('client.transfer',compact('accounts'),compact('transactions'));
            
    }

    //make new transfer
    public function new_transfer(Request $request){
        $transfer = new Transaction;
        $transfer->sender_account = session()->get('acc');
        $transfer->receiver_account = $request->receiver;
        $transfer->amount = $request->amount;
        $transfer->description = $request->description;
        $transfer->status = 'pending';
        
        // put in session 
        session()->put('amount',$request->amount);
        session()->put('receiver',$request->receiver);
        // generate otp 
        function generate_otp($n)
{
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



        //now check if balance is enough
        $id = session()->get('acc');
        $pending = Transaction::all()->where('status','=','pending');
        $transactions = Transaction::all()->where('sender_account','=',"$id")->union($pending);
        $account = Account::find($id);
        session()->put('account',$account);
        if($account->balance < $request->amount){
            return back()->with("message","Account balance is not sufficient");
        } 
        // no sending to your current account
        if($request->receiver == $id){
            return back()->with("message","Invalid transaction");
        }
        // check if there is a pending transaction
        // if(count($transactions) !== 0){
        //     return back()->with("message","There is already a pending account, either complete it or cancel it in the recent transaction table ");
        // }
      
            try{
            $transfer->save();
            Mail::to(auth()->user()->email)->send(new verifyTransaction());

        }catch(Throwable $e){
            return redirect('/transactions')->with("message","transaction failed");
        }
        return redirect('/confirm-transaction')->with("message","transaction initiated");
    }
    public function conclude_transaction(Request $request){
        $otp = session()->get('otp');
        $id = session()->get('acc');
        $account = Account::find($id);
        $transactions = Transaction::where('sender_account','=',"$id")->where(
            function($query){
                $query->where("status","=","pending");
            }
           )->get();
            $tranIds = $transactions->pluck('id')->toArray();
            $tranId = $tranIds[0];
            $transaction = Transaction::find($tranId);
        if($otp == $request->otp){
         //now transfer process
        // for receiver 
    
        $account_receiver = Account::find(session()->get('receiver'));
        $receiver_balance = $account_receiver->balance;
        $new_balance_receiver =session()->get('amount') +  $receiver_balance;
         $account_receiver->balance = $new_balance_receiver;
        $affected = DB::update(
            'update accounts set balance = "$new_balance_receiver" where id = ?',
            [$account_receiver]
        );
         try{
            $account_receiver->save();
         }catch(\Throwable $e){
            return back()->with("message","an error occured");
         }
        //for sender
            
            $sender_balance = $account->balance;
            $new_balance_sender = $sender_balance - session()->get('amount');
            $account->balance = $new_balance_sender;
            $affected2 = DB::update(
                'update accounts set balance = "$new_balance_sender" where id = ?',
                [$account]
            );
            try{
                $account->save();
             }catch(\Throwable $e){
                return back()->with("message","an error occured");
             }
             $transaction->status = "complete";
             $affected3 = DB::update(
                 'update transactions set status = "complete" where id = ?',
                 [$tranId]
                 
             );

// 
            try{         
                      $transaction->update();

             }catch(\Throwable $e){
                return back()->with("message","an t error occured");
             }
            return redirect('/transactions')->with("message","transaction complete");


        }else{
            return back()->with("message","incorrect otp try again");
        }
    }
}
