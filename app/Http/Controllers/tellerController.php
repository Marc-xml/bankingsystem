<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tellerController extends Controller
{
    //
    public function all_users(){
        $users = User::all();
        $messages = DB::table('messages')
        ->where("sender","=",auth()->user()->id)->get();
      session()->put('mss',$messages);
        return view("teller.users",compact("users"));
        
    }
    public function all_transactions(){
        $transactions = Transaction::all();
        $messages = DB::table('messages')
        ->where("sender","=",auth()->user()->id)->get();
      session()->put('mss',$messages);
        return view("teller.transactions",compact("transactions"));
    }
    public function all_loans(){
        $loans = Loan::all();
        $messages = DB::table('messages')
        ->where("sender","=",auth()->user()->id)->get();
      session()->put('mss',$messages);
        return view("teller.loans",compact("loans"));
    }
      // filter accounts 
      public function filter_accounts(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        
        if(!empty($filter)){
        
            $accounts =  Account::latest()
            ->where('id','like','%'.$filter.'%')
            ->orwhere('alias','like','%'.$filter.'%')
            ->get();
        }
        elseif (!empty($date)){
          
            $accounts = Account::latest()->where('created_at','like','%'.$date.'%')->get();
    
            
        }
        else{
           
         
            $accounts = Account::all();
     
        }
     
        return view('teller.accounts',compact('accounts'));
        
    }

    
    public function filter_users(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        
        if(!empty($filter)){
        
            $users =  User::latest()
            ->where('id','like','%'.$filter.'%')
            ->orwhere('name','like','%'.$filter.'%')
            ->orwhere('email','like','%'.$filter.'%')
            ->orwhere('phone','like','%'.$filter.'%')
            ->orwhere('address','like','%'.$filter.'%')
       
            ->get();
        }
        elseif (!empty($date)){
          
            $users = User::latest()->where('created_at','like','%'.$date.'%')->get();
    
            
        }
        else{
           
         
            $users = User::all();
     
        }
     
        return view('teller.users',compact('users'));
        
}

    // filter alll transactions 
    public function filter_alltransactions(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        
        if(!empty($filter)){
        
            $alltransactions =  Transaction::latest()
            ->where('id','like','%'.$filter.'%')
            ->orwhere('sender_account','like','%'.$filter.'%')
            ->orwhere('receiver_account','like','%'.$filter.'%')
            ->orwhere('amount','like','%'.$filter.'%')
            ->orwhere('created_at','like','%'.$filter.'%')
            ->orwhere('status','like','%'.$filter.'%')
            ->get();
        }
        elseif (!empty($date)){
          
            $alltransactions = Transaction::latest()->where('created_at','like','%'.$date.'%')->get();
    
            
        }elseif (!empty($amount)){
           
            $alltransactions  = Transaction::latest()->where('amount','=',"$amount")->get();
        }
        else{
           
         
            $alltransactions = Transaction::all();
     
        }
     
        return view('admin.transactions',compact('alltransactions'));
        
    }
    // new transfer 
    public function new_transfer(Request $request){
        $transfer = new Transaction;
        $transfer->sender_account = $request->sender;
        $transfer->receiver_account = $request->receiver;
        $transfer->amount = $request->amount;
        $transfer->description = "transfer";
        $transfer->status = 'complete';
        
        //now check if balance is enough
        $id = $request->sender;
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
        // if(count($transactions) !== 0){
        //     return back()->with("message","There is already a pending account, either complete it or cancel it in the recent transaction table ");
        // }
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

        }catch(\Throwable $e){
            return redirect('/teller/transactions')->with("message","transaction failed");
        }
        return redirect('/teller/transactions')->with("message","transaction succesfull");
    }
}