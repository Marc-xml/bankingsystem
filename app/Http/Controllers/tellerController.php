<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class tellerController extends Controller
{
    //
    public function all_users(){
        $users = User::all();
        return view("teller.users",compact("users"));
        
    }
    public function all_transactions(){
        $transactions = Transaction::all();
        return view("teller.transactions",compact("transactions"));
    }
    public function all_loans(){
        $loans = Loan::all();
        return view("teller.loans",compact("loans"));
    }
}
