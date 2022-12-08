<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Loan;
use Illuminate\Http\Request;

class loanCotroller extends Controller
{
    public function show(){
        $loans = Loan::Latest()->get();
      
    
        return view('client.loans',compact('loans'));
        
    }

    public function filterloan(Request $request , $owner_id){
      $filter = $request->query('search');
      $date = $request->query('date');
      $amount = $request->query('amount');
      $user = auth()->user()->id;

      if(!empty($filter)){
   
        $loans =  Loan::latest()
        ->where('id','like','%'.$filter.'%')
        ->orwhere('account_concerned','like','%'.$filter.'%')
        ->orwhere('date_limit','like','%'.$filter.'%')
        ->orwhere('loan_granted_at','like','%'.$filter.'%')
        ->orwhere('status','like','%'.$filter.'%')
        ->get();
    }
    elseif (!empty($date)) {
     
       $loans = Loan::latest()->where('date_limit','like','%'.$date.'%')->orwhere('loan_granted_at','like','%'.$date.'%')->get();
    
        
    }elseif (!empty($amount)){
       $loans  = Loan::latest()->where('amount','=',"$amount")->orwhere('monthly_payement','=',"$amount")->get();
    }
    else{
       
        
       $loans = Loan::latest()
        ->where('account_concerned','=',"$owner_id")->get();
    }
 
    return view('client.loans',compact('loans'));
    }
    
}
