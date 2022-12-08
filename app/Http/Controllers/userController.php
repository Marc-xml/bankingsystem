<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
 public function redirect(){
    return view('client.accounts');

    // for multi user 
    // $usertype = Auth::user()->usertype;
    // if($usertype=='1'){
      
    //     return view('admin.home');
    // }else{
    //     return view('client.home');
    // }
 }
}
