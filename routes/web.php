<?php

use App\Models\Loan;
use App\Models\Cheque;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loanCotroller;
use App\Http\Controllers\billController;
use App\Http\Controllers\cheqController;
use App\Http\Controllers\userController;
use App\Http\Controllers\wireController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\statsController;
use App\Http\Controllers\transactionController;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#####################Adming section###########################
Route::get('/users',[statsController::class,'show_users']);
Route::get('/accounts',[statsController::class,'show_accounts']);
Route::get('/alltransactions',[statsController::class,'alltransactions']);
Route::get('/complains',function(){
    return view('admin.complains');
});
// filter admin transactions 
Route::get('/filter-admintrans',[accountController::class,'filter_admintrans']);
///delete admin transactions
Route::get("/delete-admintrans/{id}",[accountController::class,'delete_admintrans']);
//transfer details 
Route::get('/transfer-details/{id}',[statsController::class,'transfer_details']);
// user details 
Route::get('/user-details/{id}',[statsController::class,'user_details']);
// delete user 
Route::get('/delete-user/{id}',[statsController::class,'delete_user']);
//revwie user info
Route::get('/review-user/{id}',[statsController::class,'review_info']);
// update user information 
Route::put('/update-user/{id}',[statsController::class,'update_user']);
// filter user 
Route::get('/filter-users',[statsController::class,'filter_users']);
// filter accounts 
Route::get('/filter-accounts',[statsController::class,'filter_accounts']);
//acocunt details
Route::get('/account-details/{id}',[statsController::class,'account_details']);
// /filter al transactions 
Route::get('/filter-alltransactions',[statsController::class,'filter_alltransactions']);
// new admin transfer 
Route::post('/new-admintransfer',[statsController::class,'new_transfer']);
//Create new user
Route::post('/new-user',[statsController::class,'new_user']);
Route::get('admin-loans',[loanCotroller::class,'new_loan']);
//loan details
Route::get('/loan-details/{id}',[loanCotroller::class,'loan_details']);
//grant loan 
Route::get('/grant/{id}',[loanCotroller::class,'grant_loan']);
//revoke laon
Route::get('/revoke/{id}',[loanCotroller::class,'revoke_loan']);
//delete loan
Route::get('/delete-adloan/{id}',[loanCotroller::class,'delete_adloan']);





//############### client zection ########################
// profile route 
Route::get('/profile',function(){
    return view('client.profile');
});
//bills
Route::post('/add-bill',[billController::class,'add_bill']);
Route::post('/bill-sched',[billController::class,'auto_bill']);
//wire transfer
Route::post('/wire-transfer',[wireController::class,'initiate_transfer']);
//delete transfer
Route::get('/delete-transfer/{id}',[wireController::class,'delete_transfer']);
//message send
Route::post('/send-message',[messageController::class,'send_message']);
//loan calculator route
Route::get('/loan-calculator',function(){
    return view('client.loancalc');
});
//laon form submit
Route::post('/add-loan',[loanCotroller::class,'add_loan']);
// laon form update 
Route::put('/update-loan/{id}',[loanCotroller::class,'update_loan']);
// loan delete 
Route::get('/delete-loan/{id}',[loanCotroller::class,'delete_loan']);
//loan review
Route::get('/loan-review/{id}',[loanCotroller::class,'preview_loan']);
//make transfer
Route::post('/new-transfer',[transactionController::class,'new_transfer']);
Route::get('/', [accountController::class,'show'])->middleware('auth','verified');
Route::get('/transactions',[transactionController::class,'show']
)->middleware('auth','verified');
Route::get('/wire',[wireController::class,'show'])->middleware('auth','verified');
Route::get('/loans',[loanCotroller::class,'show'])->middleware('auth','verified');
Route::get('/statement',function(){
    return view('client.statement');
})->middleware('auth','verified');
Route::get('/bill',function(){
    return view('client.bill');
})->middleware('auth','verified');
Route::get('/confirm',function(){
    return view('client.confirm');
});
// cheques 
Route::get('/checkbook',function(){
    $account = session()->get('acc');
     $cheques = Cheque::Latest()->where('account_number','=',"$account")->get();
    return view('client.chechreq',compact('cheques'));
});
Route::post('/req-check',[cheqController::class,'new_cheq']);
//choose account in accounts
 Route::get('/account/{id}',[accountController::class,'choose'])->middleware('auth','verified');
 //choose account in transactions
 Route::get('/accounts/{id}',[transactionController::class,'choose'])->middleware('auth','verified');
 //filter in accounts
 Route::get('/filter/{id}',[accountController::class,'filtertrans'])->middleware('auth','verified');
 //filter in transactions
 Route::get('/filter-transfer/{id}',[transactionController::class,'filtertrans'])->middleware('auth','verified');

 Route::get('/filter-loan/{owner_id}',[loanCotroller::class,'filterloan'])->middleware('auth','verified');

 Route::get('/logout',[accountController::class,'logout']);
Route::get('/test',function(){
    return view('welcome');
});
// dont touch anyhting below here 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[accountController::class,'show'])->middleware('auth','verified');
