<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Loan;
use App\Models\Account;
use App\Models\Message;
use App\Mail\loanDenied;
use App\Mail\verifyLoan;
use App\Mail\laonGranted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Console\Scheduling\Schedule;

class loanCotroller extends Controller
{
    public function show(){
        $loans = Loan::Latest()->get();
        $pending = Loan::all()->where("status","=","pending");
        $complete = Loan::all()->where("status","=","complete");
        session()->put('pending',$pending);
        session()->put('complete',$complete);
       
        return view('client.loans',compact('loans'),compact('pending'));
        
    }
    public function add_loan(Request $request){
        $user = auth()->user()->name;
        $applier = $request->name;
        $check = Loan::all()->where('name','=',$applier);
        if(count($check) == 0){
            $loan = new Loan;
            $loan->name = $request->name;
            $loan->address = $request->address;
            $loan->phone = $request->phone;
            $loan->dob = $request->dob;
            $loan->account_concerned = $request->account;
            $loan->identity_proof =$request->file('identity')->store('docs', 'public');
            $loan->income_proof = $request->file('income')->store('docs', 'public');
            $loan->address_proof = $request->file('addressproof')->store('docs', 'public');
            $loan->purpose = $request->purpose;
            $loan->email = auth()->user()->email;
            $loan->amount = $request->loan_amount;
            $loan->monthly_payement = $request->permonth;
            $loan->date_limit = $request->time;
            $loan->status = "pending";
            // $loan->loan_granted_at = date("y-m-d");
            if($request->account != session()->get("acc")){
                return back()->with("message","Enter your current active account");
            }
      session()->put('loan_account',$request->account);
            $loan->save();
            return redirect('/verify-loans')->with("message","Loan form submitted Please check your emails for the verification code");
            
            
        }else{

            return redirect('/loans')->with("message","You already have a pending loan cancel it and try again");

        }
    
    }
    public function preview_loan($id){
        $loans = Loan::all()->where('id','=',"$id");
        return view('client.loan-review',compact('loans'));
    }
    public function update_loan(Request $request,$id){
        $loan =  Loan::find($request->id);
        $loan->name = $request->name;
        $loan->address = $request->address;
        $loan->phone = $request->phone;
        $loan->dob = $request->dob;
        $loan->account_concerned = $request->account;
        $loan->identity_proof =$request->file('identity')->store('docs', 'public');
        $loan->income_proof = $request->file('income')->store('docs', 'public');
        $loan->address_proof = $request->file('addressproof')->store('docs', 'public');
        $loan->purpose = $request->purpose;
        $loan->amount = $request->loan_amount;
        $loan->monthly_payement = $request->permonth;
        $loan->date_limit = $request->time;
        $loan->status = "pending";
        // $loan->loan_granted_at = date("y-m-d");

        try{
            $loan->save();
    
            }catch(\throwable $e){
                return redirect('/loans')->with("message","Account stated does not exist");
            }
      
        return redirect('/loans')->with("message","Loan info Sucessfully updated");
    }
    public function delete_loan($id){
        $loan = Loan::find($id);
        $loan->delete();
        return redirect('/loans')->with('message','Loan request succesfully withdrawed');
    }
    public function filteradloan(Request $request ){
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
      return view('admin.loans',compact('loans'));
  
      }
      elseif (!empty($date)) {
       
         $loans = Loan::latest()->where('date_limit','like','%'.$date.'%')->orwhere('loan_granted_at','like','%'.$date.'%')->get();
      return view('admin.loans',compact('loans'));
  
      
          
      }elseif (!empty($amount)){
         $loans  = Loan::latest()->where('amount','=',$amount)->orwhere('monthly_payement','=',$amount)->get();
      return view('admin.loans',compact('loans'));
  
      }
      else{
         
          
         $loans = Loan::latest();
          
      }
      // $pending = Loan::all()->where("status","=","pending");
      return view('admin.loans',compact('loans'));
      }
    public function filterloan(Request $request,$owner_id ){
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
    return view('client.loans',compact('loans'));

    }
    elseif (!empty($date)) {
     
       $loans = Loan::latest()->where('date_limit','like','%'.$date.'%')->orwhere('loan_granted_at','like','%'.$date.'%')->get();
    return view('client.loans',compact('loans'));

    
        
    }elseif (!empty($amount)){
       $loans  = Loan::latest()->where('amount','=',$amount)->orwhere('monthly_payement','=',$amount)->get();
    return view('client.loans',compact('loans'));

    }
    else{
       
        
       $loans = Loan::latest()
        ->where('account_concerned','=',"$owner_id")->get();
    }
    // $pending = Loan::all()->where("status","=","pending");
    return view('client.loans',compact('loans'));
    }
    
    // admin section 
    public function new_loan(){
        $loans = Loan::all();
        return view('admin.loans',compact('loans'));
    }
    // oan details 
    public function loan_details($id){
        $loan = Loan::find($id);
        return view("admin.loan_details",compact('loan'));
    }
    public function grant_loan($id){
        session()->put("loan_id",$id);
        $loan = Loan::find($id);
        $account_id = $loan->account_concerned;
        $amount = $loan->amount;
        $account = Account::find($account_id);
        $new_balance = $account->balance + $amount;
        $account->balance = $new_balance;
        $loan->status = "granted";
        $loan->update();
        $account->update();
        Mail::to($loan->email)->send(new laonGranted);

    

        return back()->with("message","Loan has been granted to user");
    }
     protected function schedule(Schedule $schedule){
        $schedule->call(function (){
            $id = session()->get("loan_id");
            $loan = Loan::find($id);
            $account_id = $loan->account_concerned;
            $amount = $loan->amount;
            $amount_payed = 0;
            $account = Account::find($account_id);
          while($amount != $amount_payed){
            if($account->balance > $loan->monthly_payement){
                $pay = $account->balance - $loan->monthly_payement;
                $account->balance = $pay;
                $amount_payed += $pay;
                $loan->amount_payed = $amount_payed;
                try{
                    $loan->update();
                    $account->update();
                return redirect('/loans')->with("message","Monthly loan payement succesfull");
                    
                }catch(\throwable $e){
                    return redirect('/loans')->with("message","An error occured when trying to get loan monthly payement");
                }
            }else{
                return redirect('/loans')->with("message","Balance not enoug");
            }
          }
        })->monthly();
     }
    public function revoke_loan($id){
        $loan = Loan::find($id);
        $loan->status = "denied";
        $loan->update();
        Mail::to($loan->email)->send(new loanDenied);
        return back()->with("message","Loan request has been revoked");
    }
    public function delete_adloan($id){
        $loan = Loan::find($id);
        $loan->delete();
        return back()->with("message","loan succesfully deleted");
    }
    public function verify_loan(){
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

         try{
         Mail::to(auth()->user()->email)->send(new verifyLoan());
         }catch(\Throwable $e){
            return back()->with("message","check your internet connection");
         }
         return view("client.confirm_loan")->with("message","Please check your emails for the verification code ");
    }
    public function confirm_loan(Request $request){
        $otp = session()->get('otp');
        if($otp == $request->otp){
            $account = session()->get('loan_account');
            $loans = Loan::where("account_concerned","=",$account)->where(function($query){
                $query->where("status","=","pending");
            })->get();
            $loanIds = $loans->pluck('id')->toArray();
            $loanId = $loanIds[0];
            $loan = Loan::find($loanId);
            $loan->status = "complete";
                try{
            $loan->save();

                }catch(\Throwable $e){
                    return back()->with("message","an error occured");
                }
                return redirect('/loans')->with("message","Loan verification complete");
        }else{
            return back()->with("message","Incorrect otp code");
        }

    }
}
