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


}
