<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Throwable;

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
         
            return view('client.accounts',compact('accounts'),compact('transactions'));
            
    }

    //make new transfer
    public function new_transfer(Request $request){
        $transfer = new Transaction;
        $transfer->sender_account = $request->receiver;
        $transfer->receiver_account = session()->get('acc');
        $transfer->amount = $request->amount;
        $transfer->description = $request->description;
        $transfer->status = 'pending';
        
        //now check if balance is enough
        $id = session()->get('acc');
        $pending = Transaction::all()->where('status','=','pending');
        $transactions = Transaction::all()->where('sender_account','=',"$id")->union($pending);
        $account = Account::find($id);
        if($account->balance < $request->amount){
            return back()->with("message","Account balance is not sufficient");
        } 
        // no sending to your current account
        if($request->receiver == $id){
            return back()->with("message","Invalid transaction");
        }
        // check if there is a pending transaction
        if(count($transactions) !== 0){
            return back()->with("message","There is already a pending account, either complete it or cancel it in the recent transaction table ");
        }
        //now transfer process
        // for receiver 
    
        $account_receiver = Account::find($request->receiver);
        $receiver_balance = $account_receiver->balance;
        $new_balance_receiver =$request->amount +  $receiver_balance;
         $account_receiver->balance = $new_balance_receiver;
        
         try{
            $account_receiver->save();
         }catch(\Throwable $e){
            return back()->with("message","an error occured");
         }
        //for sender
            
            $sender_balance = $account->balance;
            $new_balance_sender = $sender_balance - $request->amount;
            $account->balance = $new_balance_sender;
            try{
                $account->save();
             }catch(\Throwable $e){
                return back()->with("message","an error occured");
             }
         

            try{
            $transfer->save();

        }catch(Throwable $e){
            return redirect('/transactions')->with("message","transaction failed");
        }
        return redirect('/transactions')->with("message","transaction succesfull");
    }
}
