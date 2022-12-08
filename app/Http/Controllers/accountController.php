<?php


namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\Message;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class accountController extends Controller
{
    // message ssection 

public function send_message(Request $request){
    $message = new Message;
    $message->content = $request->content;
    $message->save();
     return back()->with('message','Message sent');
}
public function show(Request $request){

    $user =auth()->user()->id;
    // $id = 2 ;
   
    $accounts = Account::all()
    ->where('owner_id','=',"$user");
    $raccount = compact('accounts');
 foreach($accounts as $account){
    $id = $account->first()->id;
 }
 
    $request->session()->put('acc',$id);

    $transactions = Transaction::latest()
     ->where('sender_account','=',"$id")
    ->orwhere('receiver_account','=',"$id")
   ->get();
   $messages = DB::table('messages')->get();
    return view('client.accounts',compact('accounts'),compact('transactions'),compact('messages'));
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

   $messages = DB::table('messages')->get();
    
    return view('client.accounts',compact('accounts'),compact('transactions'),$id,compact('messages'));
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
        elseif (!empty($date)){
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
public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');

}

}
