<?php


namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class accountController extends Controller
{
public function show(){
    session_start();
    $user =auth()->user()->id;
    $id = 2 ;
    $accounts = Account::all()
    ->where('owner_id','=',"$user");
    $transactions = Transaction::latest()
     ->where('sender_account','=',"$id")
    ->orwhere('receiver_account','=',"$id")
   ->get();
    return view('client.accounts',compact('accounts'),compact('transactions'));
}
public function choose(Request $request ,$id){
    $user = auth()->user()->id;
    $accounts = Account::all()
    ->where('owner_id','=',"$user");
    $transactions = Transaction::latest()
    ->where('sender_account','=',"$id")
    ->orwhere('receiver_account','=',"$id")
   ->get();
   
    
    
    return view('client.accounts',compact('accounts'),compact('transactions'),$id);
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
            ->orwhere('date','like','%'.$filter.'%')
            ->orwhere('status','like','%'.$filter.'%')
            ->get();
        }
        elseif (!empty($date)) {
            $accounts = Account::all()->where('owner_id','=',"$user");
            $transactions = Transaction::latest()->where('date','like','%'.$date.'%')->get();
        
            
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
public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');

}
}
