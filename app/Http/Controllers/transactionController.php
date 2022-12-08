<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    public function show(){
        $transaction = Transaction::all();
        
    }
}
