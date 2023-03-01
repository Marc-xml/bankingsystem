<?php


namespace App\Http\Controllers;


use App\Models\Loan;
use App\Models\User;

use App\Models\Wire;
use App\Models\Account;
use App\Models\Message;
use App\Models\Complain;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class accountController extends Controller
{
    // message ssection 

public function send_message(Request $request){
    $message = new Message;
    $message->content = $request->content;
    $message->save();
    $messages = DB::table('messages')
    ->where("sender","=",auth()->user()->id)->get();
     return back()->with('message','Message sent');

  
  
}
public function show(Request $request){
    $usertype = auth()->user()->usertype;
    if(auth()->user()->restricted == "yes"){
        return back()->with("message","Your account has been suspended");
    }
    if($usertype=='1'){
        // admin section 
        // count accounts 
      $countAccount = count(Account::all());
      session()->put("countAcc",$countAccount);
    //   count users 
      $countUsers = count(User::all());
      session()->put("countUsers",$countUsers);
    //   count transactions 
    $countTransactions = count(Transaction::all());
    session()->put("countTransactions",$countTransactions);
     //   count complains 
     $countComplain = count(Complain::all());
     session()->put("countComplain",$countComplain);
   //count complains
   $countComplains = count(Complain::all());
   session()->put("countComp",$countComplains);
    // get all transactions 
    $adminTransactions = Transaction::all();
    $thisyeartransaction = Transaction::query()
    ->whereYear('created_at', 2023)
    ->selectRaw('month(created_at) as month')
    ->selectRaw('count(*) as count')
    ->groupBy('month')
    ->orderBY('month')
    ->pluck('count','month')
    ->values()
    ->toArray();

       $domestic = Transaction::query()
       ->whereYear('created_at', 2023)
       ->selectRaw('month(created_at) as month')
       ->selectRaw('sum(amount) as amount')
       ->groupBy('month')
       ->orderBY('month')
       ->pluck('amount','month')
       ->values()
       ->toArray();

   $inter = Wire::query()
   ->whereYear('created_at', 2023)
       ->selectRaw('month(created_at) as month')
       ->selectRaw('sum(amount) as amount')
       ->groupBy('month')
       ->orderBY('month')
       ->pluck('amount','month')
       ->values()
       ->toArray();
//    dd(compact('credits'));
       
    $request->session()->put('thisyeartransaction',$thisyeartransaction);
        return view('admin.main',compact('adminTransactions'),compact('thisyeartransaction','domestic','inter'));

        // filter transactions 

    }
    else if($usertype == 2){
        //count accounts
        $countAccount = count(Account::all());
        session()->put("countAcc",$countAccount);
    //    count users 
        $countUsers = count(User::all());
        session()->put("countUsers",$countUsers);
        // count loans 
        $countLoan = count(Loan::all());
        session()->put("countLoan",$countLoan);
           //   count transactions 
    $countTransactions = count(Transaction::all());
    session()->put("countTransactions",$countTransactions);
    //count complains
    $countComplains = count(Complain::all());
    session()->put("countComp",$countComplains);
        //count users
    $countUsers = count(User::all());
    session()->put("countUsers",$countUsers);
        // get all transactions 
        $adminTransactions = Transaction::all();
       $accounts = Account::all();

    return view("teller.accounts",compact("accounts"));

    }
    else{
        // client section 
        $user =auth()->user()->id;
    $accounts = Account::all()
    ->where('owner_id','=',"$user");
    $raccount = compact('accounts');
    
//  foreach($accounts as $account){
//     $id = $account->first()->id;
//  }
 $accountIds = $accounts->pluck('id')->toArray();
    $id = $accountIds[0];
    $request->session()->put('acc',$id);

    $transactions = Transaction::latest()
     ->where('sender_account','=',$id)
    ->orwhere('receiver_account','=',$id)
   ->take(5)->get();
   $messages = DB::table('messages')
   ->where("sender","=",auth()->user()->id)->get();
   $thisyeartransaction = Transaction::query()
   ->whereYear('created_at', 2023)
   ->selectRaw('month(created_at) as month')
   ->selectRaw('count(*) as count')
   ->groupBy('month')
   ->orderBY('month')
   ->pluck('count','month')
   ->values()
   ->toArray();
   $debits = Transaction::query()
   ->whereYear('created_at',2023)
   ->selectRaw('month(created_at) as month')
   ->selectRaw('sum(amount) as amount')
   ->where('sender_account',$id)
   ->groupBy('month')
   ->orderBy('month')
   ->pluck('amount','month')
   ->values()
   ->toArray();

   $credits = Transaction::query()
   ->whereYear('created_at',2023)
   ->selectRaw('month(created_at) as month')
   ->selectRaw('sum(amount) as amount')
   ->where('receiver_account',$id)
   ->groupBy('month')
   ->orderBy('month')
   ->pluck('amount','month')
   ->values()
   ->toArray();
   
   $request->session()->put('mss',$messages);
   $request->session()->put("thisyeartransaction",$thisyeartransaction);
   $request->session()->put("debits",$debits);
   $request->session()->put("credits",$credits);
    return view('client.accounts',compact('accounts','transactions','thisyeartransaction','debits','credits'));
    }
   
}
// public function show(Request $request)
// {
//     $user = auth()->user(); // or $request->user();

//     /* Get Account */
//     $accounts = Account::where('owner_id', $user->id)->get();
//     // When a relation is properly present in the model: $accounts = $user->accounts;

//     // Get Account IDs as Array...
//     $accountIds = $accounts->pluck('id')->toArray();
//     $id = $accountIds[0];
//     $request->session()->put('acc',$id);
//     $transactions  = Transaction::whereIn('sender_account', $accountIds)->orWhereIn('receiver_account', $accountIds)->get();
//     $messages = DB::table('messages')->get();

//    Return view('client.accounts', [
//         'transactions' => $transactions,
//         'messages' => $messages,
//         'accounts' => $accounts,
//     ]);
// }
public function display_account($id){
    $account = Account::find($id);
    return view('client.account-alias',compact('account'));
}
public function change_alias(Request $request,$id){
    $account = Account::find($id);
    $account->alias = $request->alias;
    $account->update();
   
return back()->with("message","Account alias changed");
}
public function choose(Request $request ,$id){
    $user = auth()->user()->id;
    $accounts = Account::all()
    ->where('owner_id','=',"$user");
    $request->session()->put('acc',$id);

    $transactions = Transaction::latest()
    ->where('sender_account','=',"$id")
    ->orwhere('receiver_account','=',"$id")
    ->take(5)
   ->get();

   $messages = DB::table('messages')->
   where("sender","=",auth()->user()->id)->get();
   $thisyeartransaction = Transaction::query()
   ->whereYear('created_at', 2023)
   ->selectRaw('month(created_at) as month')
   ->selectRaw('count(*) as count')
   ->groupBy('month')
   ->orderBY('month')
   ->pluck('count','month')
   ->values()
   ->toArray();
   $request->session()->put('thisyeartransaction',$thisyeartransaction);
   
   $debits = Transaction::query()
   ->whereYear('created_at',2023)
   ->selectRaw('month(created_at) as month')
   ->selectRaw('sum(amount) as amount')
   ->where('sender_account',$id)
   ->groupBy('month')
   ->orderBy('month')
   ->pluck('amount','month')
   ->values()
   ->toArray();
   $request->session()->put('debits',$debits);

   $credits = Transaction::query()
   ->whereYear('created_at',2023)
   ->selectRaw('month(created_at) as month')
   ->selectRaw('sum(amount) as amount')
   ->where('receiver_account',$id)
   ->groupBy('month')
   ->orderBy('month')
   ->pluck('amount','month')
   ->values()
   ->toArray();
   $request->session()->put('credits',$credits);
   
   $request->session()->put('mss',$messages);
    return view('client.accounts',compact('accounts','transactions','thisyeartransaction','debits','credits','id','messages'));
    
   
    // return view('client.accounts',compact('accounts'),compact('transactions'),$id,compact('messages'));
}
public function filtertrans(Request $request,$id){
        $filter = $request->query('search');
        $date = $request->query('date');
        $amount = $request->query('amount');
        $user = auth()->user()->id;
        $thisyeartransaction = session()->get('thisyeartransaction');
        $debits = session()->get('debits');
        $credits = session()->get('credits');
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
     
        return view("client.accounts",compact('accounts'),compact('transactions','debits','credits','thisyeartransaction'));
        
}
// filter admin transactions 
public function filter_admintrans(Request $request){
    $filter = $request->query('search');
    $date = $request->query('date');
    $amount = $request->query('amount');
    $user = auth()->user()->id;
    if(!empty($filter)){
    
        $adminTransactions =  Transaction::latest()
        ->where('id','like','%'.$filter.'%')
        ->orwhere('sender_account','like','%'.$filter.'%')
        ->orwhere('receiver_account','like','%'.$filter.'%')
        ->orwhere('amount','like','%'.$filter.'%')
        ->orwhere('created_at','like','%'.$filter.'%')
        ->orwhere('status','like','%'.$filter.'%')
        ->get();
    }
    elseif (!empty($date)){
      
        $adminTransactions = Transaction::latest()->where('created_at','like','%'.$date.'%')->get();

        
    }elseif (!empty($amount)){
       
        $adminTransactions  = Transaction::latest()->where('amount','=',"$amount")->get();
    }
    else{
       
     
        $adminTransactions = Transaction::all();
 
    }
 
    return view('admin.main',compact('adminTransactions'));
    
}
public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');

}
public function delete_admintrans($id){
    $transaction = Transaction::find($id);
    $transaction->delete();
   return back()->with('message',"transactions succesufly deleted");
}

}
