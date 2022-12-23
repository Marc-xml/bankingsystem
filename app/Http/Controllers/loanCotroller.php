<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Loan;
use Error;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class loanCotroller extends Controller
{
    public function show(){
        $loans = Loan::Latest()->get();
      
    
        return view('client.loans',compact('loans'));
        
    }
    public function add_loan(Request $request){
        $user = auth()->user()->name;
        $applier = $request->name;
        $check = Loan::all()->where('name','=','applier');
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
            $loan->amount = $request->loan_amount;
            $loan->monthly_payement = $request->permonth;
            $loan->date_limit = $request->time;
            $loan->status = "pending";
            // $loan->loan_granted_at = date("y-m-d");
    
            $loan->save();
            return redirect('/loans')->with("message","Loan form submitted");
            
            
        }else{

            return redirect('/loans')->with("message","You already have an ongoing or pending loan");

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
        $loan = Loan::find($id);
        $loan->status = "granted";
        $loan->update();
        return back()->with("message","Loan has been granted to user");
    }

    public function revoke_loan($id){
        $loan = Loan::find($id);
        $loan->status = "denied";
        $loan->update();
        return back()->with("message","Loan request has been revoked");
    }
    public function delete_adloan($id){
        $loan = Loan::find($id);
        $loan->delete();
        return back()->with("message","loan succesfully deleted");
    }
}
