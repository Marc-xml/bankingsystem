<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;

class billController extends Controller
{
    //
    public function add_bill(Request $request){
        $bill = new Bill;
        $bill->company_id = $request->company_id;
        $bill->amount = $request->amount;
        $bill->account_concerned = $request->account_sending;
        $bill->company_name = $request->company_name;
        $bill->company_account = $request->company_account;
        $bill->address = $request->address;
        $bill->status = 'pending';
        
        try{
            $bill->save();
        }catch(\Throwable $e){
            return back()->with("message","Account you entered doesnt exist");
        }
            return back()->with("message","Payment initiated, please check your email box to verify this payement");
  
        }
    // public function auto_bill(Schedule $schedule,Request $request){
    //     $account = session()->get('acc');
    //     $bills = Bill::all()->where('account_concerned','=',"$account");
    //     foreach($bills as $billed){
        
    //     if($bills->schedule == 'month'){
    //         $schedule->call(function(Request $request){
    //             $account = session()->get('acc');
    //     $bills = Bill::all()->where('account_concerned','=',"$account");

                

    //            if($bills->amount < $account->balance){
                
          
    //             $id = $billed->id;
    //             $bill = Bill::find($id);
    //             $bill->company_id = $billed->company_id;
    //             $bill->amount = $billed->amount;
    //             $bill->account_concerned = $billed->account_sending;
    //             $bill->company_name = $billed->company_name;
    //             $bill->company_account = $billed->company_account;
    //             $bill->address = $billed->address;
    //             $bill->status = 'pending';
    //          }
                
    //             try{
    //                 $bill->save();
    //             }catch(\Throwable $e){
    //                 return back()->with("message","Account you entered doesnt exist");
    //             }
    //                 return back()->with("message","Payment initiated, please check your email box to verify this payement");
          
                
               

    //                 return back()->with("message","Your balance is insuffucient");

            
    //         })->monthly();
    //     }elseif($bills->schedule == 'week'){
    //         $schedule->call(function(Request $request){
    //             $account = session()->get('acc');
    //             $bills = Bill::all()->where('account_concerned','=',"$account");
        
                
                        
        
    //                    if($bills->amount < $account->balance){
                        
                  
    //                     $id = $billed->id;
    //                     $bill = Bill::find($id);
    //                     $bill->company_id = $billed->company_id;
    //                     $bill->amount = $billed->amount;
    //                     $bill->account_concerned = $billed->account_sending;
    //                     $bill->company_name = $billed->company_name;
    //                     $bill->company_account = $billed->company_account;
    //                     $bill->address = $billed->address;
    //                     $bill->status = 'pending';
    //                  }
                        
    //                     try{
    //                         $bill->save();
    //                     }catch(\Throwable $e){
    //                         return back()->with("message","Account you entered doesnt exist");
    //                     }
    //                         return back()->with("message","Payment initiated, please check your email box to verify this payement");
                  
                        
                       
        
    //                         return back()->with("message","Your balance is insuffucient");
        
                    
    //                })->weekly();
    //     }else{
    //         $schedule->call(function(Request $request){
    //             $account = session()->get('acc');
    //             $bills = Bill::all()->where('account_concerned','=',"$account");
        
                        
                        
        
    //                    if($bills->amount < $account->balance){
                        
                  
    //                     $id = $billed->id;
    //                     $bill = Bill::find($id);
    //                     $bill->company_id = $billed->company_id;
    //                     $bill->amount = $billed->amount;
    //                     $bill->account_concerned = $billed->account_sending;
    //                     $bill->company_name = $billed->company_name;
    //                     $bill->company_account = $billed->company_account;
    //                     $bill->address = $billed->address;
    //                     $bill->status = 'pending';
    //                  }
                        
    //                     try{
    //                         $bill->save();
    //                     }catch(\Throwable $e){
    //                         return back()->with("message","Account you entered doesnt exist");
    //                     }
    //                         return back()->with("message","Payment initiated, please check your email box to verify this payement");
                  
                        
                       
        
    //                         return back()->with("message","Your balance is insuffucient");
        
                    
    //                  })->daily();
    //     }
    // }

       
    // }
}
