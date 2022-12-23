<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class statsController extends Controller
{
    //
    public function transfer_details($id){
        $transaction = Transaction::find($id);
        return view('admin.transfer_details',compact('transaction'));
    }
    // to show all users 
    public function show_users(){
        $users = User::all();
        return view("admin.users",compact('users'));

    }
    // use details;
    public function user_details($id){
        $user = User::find($id);
        return view('admin.user_details',compact('user'));
    }
    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return back()->with("message","user successfuly deleted");
    }
    public function review_info($id){
        $user = User::find($id);
        return view("admin.edit_user",compact('user'));
    }
    // update user info 
    public function update_user(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;

        try{
            $user->update();
            return back()->with('message','Information successfully updated');
        }catch(\Throwable $e){
            return back()->with("message","information not updated please try again");
        }
        return back()->with('message    ","Information successfully updated');

    }
    // filter users 
    public function filter_users(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        $user = auth()->user()->id;
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
     
        return view('admin.users',compact('users'));
        
    }
    // show acounts 
    public function show_accounts(){
        $accounts = Account::all();
        return view('admin.accounts',compact("accounts"));
        
    }
    // filter accounts 
    public function filter_accounts(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        $user = auth()->user()->id;
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
     
        return view('admin.accounts',compact('accounts'));
        
    }
    public function account_details($id){
        $account = Account::find($id);
        return view("admin.account_details",compact('account'));
    }
    //all transactions on admin side
    public function alltransactions(){
        $alltransactions = Transaction::all();
        return view('admin.transactions',compact('alltransactions'));
    }
    // filter alll transactions 
    public function filter_alltransactions(Request $request){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        $user = auth()->user()->id;
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
            return redirect('/alltransactions')->with("message","transaction failed");
        }
        return redirect('/alltransactions')->with("message","transaction succesfull");
    }
    public function new_user(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->Phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;
        // $user->save();
        try{
            $user->save();
            return back()->with("message","New user created successfully");
        }catch(\Throwable $e){
            return back()->with("message","Error occured please try again");

        }
    }



}
