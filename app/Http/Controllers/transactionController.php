<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Account;
use App\Models\Message;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\verifyTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class transactionController extends Controller
{
    public function show(){

        $user =auth()->user()->id;
        $accounts = Account::all()
        ->where('owner_id','=',"$user");
        $accountIds = $accounts->pluck('id')->toArray();
    $id = $accountIds[0];
        // $request->session()->put('acc',$id);
        
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
    $messages = DB::table('messages')
    ->where("sender","=",auth()->user()->id)->get();
  session()->put('mss',$messages);
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

    public function delete_pending(Request $request,$id){
        $transaction = Transaction::find($id);
        try{
            $transaction->delete();
            return back()->with("message","Transaction deleted");
        }catch(\Throwable $e){
            return back()->with("message","Transaction not deleted");

        }
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
            return view('client.transfer',compact('accounts'),compact('transactions','debits','credits'));
            
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



        //now check if balance is enough
        $id = session()->get('acc');
        // $pending = Transaction::all()->where('status','=','pending');
        $transactions = Transaction::where('sender_account','=',$id)
        ->where(function($query){
            $query->where("status","=","pending");
        })->get();
        $account = Account::find($id);
        session()->put('account',$account);
        if($account->balance < $request->amount){
            return back()->with("message","Account balance is not sufficient");
        } 
        // no sending to your current account
        if($request->receiver == $id){
            return back()->with("message","Invalid transaction");
        }
        if($request->amount<1000){
            return back()->with("message","Amount transfered  must be atleast 1000XAF");
        }
        // dd(count($transactions));
        // check if there is a pending transaction
        if(count($transactions) >0){
            return back()->with("message","There is already a pending account, cancel it in the recent transaction table ");
        }
      else{
        try{
            $transfer->save();
            Mail::to(auth()->user()->email)->send(new verifyTransaction());

        }catch(Throwable $e){
            return redirect('/transactions')->with("message","transaction failed,check your internet connection");
        }
        return redirect('/confirm-transaction')->with("message","transaction initiated");  
      }
          
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
    public function report(){
        $date=date("m");
        $id = session()->get('acc');

        $transactions=Transaction::whereRaw("month(created_at) =?",[$date])->get();
        $debit = Transaction::whereRaw("month(created_at)=?",[$date])->where(
            function($query,){
                $query->where("sender_account","=",session()->get('acc'));
            }
        )->sum("amount");
        
        $credit = Transaction::whereRaw("month(created_at)=?",[$date])->where(
            function ($query,){
                $query->where("receiver_account","=",session()->get('acc'));
            }
        )->sum("amount");
        $total = Transaction::whereRaw("month(created_at)=?",$date)->sum("amount");
        return view("client.statement",compact("total","transactions","debit","credit","date"));

    }
    public function monthly_transact(Request $request){
        $date = $request->month;
        $id = session()->get('acc');

        $transactions=Transaction::whereRaw("month(created_at) =?",[$date])->get();
        $debit = Transaction::whereRaw("month(created_at)=?",[$date])->where(
            function($query){
                $query->where("sender_account","=",session()->get('acc'));
            }
        )->sum("amount");
        
        $credit = Transaction::whereRaw("month(created_at)=?",[$date])->where(
            function ($query,){
                $query->where("receiver_account","=",session()->get('acc'));
            }
        )->sum("amount");
        $total = Transaction::whereRaw("month(created_at)=?",$date)->sum("amount");
        return view("client.statement",compact("total","transactions","debit","credit","date"));

           
    }
    public function precise_transact(Request $request){
        $month = $request->month;
        $year = $request->year;
        $date = $request->date; 
        if($date >=30){
            return back()->with("message","Date must be less than 30");
        }
      $request->session()->put("year",$year);
        $request->session()->put("date",$date);
      $year_query = Transaction::whereRaw("year(created_at)=?",[$year]);
      $transactions = Transaction::whereRaw("month(created_at)=?",[$month])
      ->where(function($query){
        $query->whereRaw("year(created_at)=?",session()->get("year"));
    })->where(function($query){
        $query->whereRaw("day(created_at)=?",session()->get("date"));
    })->get();
        -
        
      
        $debit =Transaction::whereRaw("month(created_at)=?",[$month])
        // ->union($year_query)
        ->where(function($query){
            $query->where("sender_account","=",session()->get("acc"));
        })
        ->where(function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
        })->where(function($query){
            $query->whereRaw("day(created_at)=?",session()->get("date"));
        })
        ->sum("amount");

        $credit = Transaction::whereRaw("month(created_at)=?",[$month])
        // ->union($year_query)
        ->where(function($query){
            $query->where("receiver_account","=",session()->get("acc"));
        })
        ->where(function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
        })
        ->where(function($query){
            $query->whereRaw("day(created_at)=?",session()->get("date"));
        })
        
        ->sum("amount");

        $total = Transaction::whereRaw("month(created_at)=?",[$month])
        ->where(function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
            
        })
        ->where(function($query){
            $query->whereRaw("day(created_at)=?",session()->get("date"));
        })
        
        
        // ->union($year_query)
        ->sum("amount");
    
        return view("client.statement",compact("total","transactions","debit","credit","date","year","month"));

    }
    public function range_transact(Request $request){
        $from = $request->from;
        $to = $request->to;
        $year = $request->year;
        $request->session()->put("year",$year);
// dd($from,$to,$year);
        $transactions = Transaction::whereBetween(DB::raw("month(created_at)"),[$from,$to])
        ->where( function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
        })->get();
        // dd($transactions);
        $debit =  Transaction::whereBetween(DB::raw("month(created_at)"),[$from,$to])
        ->where( function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
        })
        ->where( function($query){
            $query->where("sender_account","=",session()->get("acc"));
        })
        ->sum("amount");
        $credit =  Transaction::whereBetween(DB::raw("month(created_at)"),[$from,$to])
        ->where( function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
        })
        ->where( function($query){
            $query->where("receiver_account","=",session()->get("acc"));
        })
        ->sum("amount");
        $total =  Transaction::whereBetween(DB::raw("month(created_at)"),[$from,$to])
        ->where( function($query){
            $query->whereRaw("year(created_at)=?",session()->get("year"));
        })->sum("amount");
        return view("client.statement",compact("total","transactions","debit","credit","from","to","year"));
    }
}
