<?php

use App\Models\Loan;
use App\Models\News;
use App\Models\Cheque;
use App\Models\Insight;
use App\Models\Welcome;
use App\Models\Complain;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loanCotroller;
use App\Http\Controllers\billController;
use App\Http\Controllers\cheqController;
use App\Http\Controllers\userController;
use App\Http\Controllers\wireController;
use App\Http\Controllers\statsController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\complainController;
use App\Http\Controllers\transactionController;
use App\Mail\TestMail;
use Database\Seeders\transactionSeeder;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Support\Facades\Mail;

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

//###################HOME SECITON#############################
//emails section
Route::get('/confirm-transaction',function(){
    return view('client.confirm');
})->middleware('auth','verified');
Route::get('/conclude-transaction',[transactionController::class,'conclude_transaction'])->middleware('auth','verified');
Route::get('/verify-loans',[loanCotroller::class,'verify_loan'])->middleware('auth','verified');
Route::get('/confirm-loan',[loanCotroller::class,'confirm_loan'])->middleware('auth','verified');
Route::get('/email-user/{id}',[userController::class,'contact_user'])->middleware('auth','verified');
Route::post('/send_email',[userController::class,'send_email'])->middleware('auth','verified');

#####################Adming section###########################
//Route to  home page
Route::get('/home-page',function(){
    $welcome =Welcome::find(1);
    // $welcome = compact('welcome');
    session()->put('welcome',$welcome);
    $insights = Insight::all();
    $news = News::all();
    return view('home.home',compact('insights'),compact('news'));
})->middleware('auth','verified');
Route::get('/home-section',[statsController::class,'show_home'])->middleware('auth','verified');
//update welcome message
Route::put('/add-message/{id}',[statsController::class,'edit_message'])->middleware('auth','verified');
// create news
Route::get('/news',function(){
    return view('home.add_news');
})->middleware('auth','verified');
// change news 
Route::put('/change-news/{id}',[statsController::class,'change_news'])->middleware('auth','verified');
// edit news 
Route::get('/edit-news/{id}',[statsController::class,'edit_news'])->middleware('auth','verified');
// Add news 
Route::post('/add-news',[statsController::class,'add_news'])->middleware('auth','verified');
// Delete news 
Route::get('/delete-news/{id}',[statsController::class,'delete_news'])->middleware('auth','verified');
//insight form
Route::get('/insight-form',function(){
    return view("home.add_insight");
})->middleware('auth','verified');
    //Add insight
Route::post('/add-insight',[statsController::class,'add_insight'])->middleware('auth','verified');
// delete insight 
Route::get('/delete-insight/{id}',[statsController::class,'delete_insight'])->middleware('auth','verified');
// edit insight 
Route::get('/edit-insight/{id}',[statsController::class,'edit_insight'])->middleware('auth','verified');
//change insight
Route::put('/change-insight/{id}',[statsController::class,'change_insight'])->middleware('auth','verified');
Route::get('/users',[statsController::class,'show_users'])->middleware('auth','verified');
Route::get('/accounts',[statsController::class,'show_accounts'])->middleware('auth','verified');
Route::get('/alltransactions',[statsController::class,'alltransactions'])->middleware('auth','verified');
// filter admin transactions 
Route::get('/filter-admintrans',[accountController::class,'filter_admintrans'])->middleware('auth','verified');
///delete admin transactions
Route::get("/delete-admintrans/{id}",[accountController::class,'delete_admintrans'])->middleware('auth','verified');
//transfer details 
Route::get('/transfer-details/{id}',[statsController::class,'transfer_details'])->middleware('auth','verified');
// user details 
Route::get('/user-details/{id}',[statsController::class,'user_details'])->middleware('auth','verified');
// delete user 
Route::get('/delete-user/{id}',[statsController::class,'delete_user'])->middleware('auth','verified');
//revwie user info
Route::get('/review-user/{id}',[statsController::class,'review_info'])->middleware('auth','verified');
// resctirct user 
Route::get('/restrict-user/{id}',[statsController::class,'restrict_access'])->middleware('auth','verified');
// update user information 
Route::put('/update-user/{id}',[statsController::class,'update_user'])->middleware('auth','verified');
// filter user 
Route::get('/filter-users',[statsController::class,'filter_users'])->middleware('auth','verified');
// filter accounts 
Route::get('/filter-accounts',[statsController::class,'filter_accounts'])->middleware('auth','verified');
//acocunt details
Route::get('/account-details/{id}',[statsController::class,'account_details'])->middleware('auth','verified');
// /filter al transactions 
Route::get('/filter-alltransactions',[statsController::class,'filter_alltransactions'])->middleware('auth','verified');
// new admin transfer 
Route::post('/new-admintransfer',[statsController::class,'new_transfer'])->middleware('auth','verified');
//Create new user
Route::post('/new-user',[statsController::class,'new_user'])->middleware('auth','verified');
Route::get('admin-loans',[loanCotroller::class,'new_loan'])->middleware('auth','verified');
//loan details
Route::get('/loan-details/{id}',[loanCotroller::class,'loan_details'])->middleware('auth','verified');
//grant loan 
Route::get('/grant/{id}',[loanCotroller::class,'grant_loan'])->middleware('auth','verified');
//revoke laon
Route::get('/revoke/{id}',[loanCotroller::class,'revoke_loan'])->middleware('auth','verified');
//delete loan
Route::get('/delete-adloan/{id}',[loanCotroller::class,'delete_adloan'])->middleware('auth','verified');
// show user complains
Route::get('/complains',[complainController::class,'all_complains'])->middleware('auth','verified');
//complaine details
Route::get('/complain-detail/{id}',[complainController::class,'complain_detail'])->middleware('auth','verified');
//reply to complain 
Route::put('/reply-complain/{id}',[complainController::class,'reply_complain'])->middleware('auth','verified');
//delte complain
Route::get("delete-complain/{id}",[complainController::class,'delete_complain'])->middleware('auth','verified');

//testing email
Route::get('send-testmail',function(){
    $mailData = [
        "amount" => 1500,
        "receiver" => 'marc',
        "otp" => 753376
    ];
    Mail::to(auth()->user()->email)->send(new TestMail($mailData));
    dd("email sent succesfullly");
});

//############### client zection ########################
// profile route 
Route::get('/profile',function(){
    return view('client.profile');
})->middleware('auth','verified');
//bills
Route::post('/add-bill',[billController::class,'add_bill'])->middleware('auth','verified');
Route::post('/bill-sched',[billController::class,'auto_bill'])->middleware('auth','verified');
//wire transfer
Route::post('/wire-transfer',[wireController::class,'initiate_transfer'])->middleware('auth','verified');
//delete transfer
Route::get('/delete-transfer/{id}',[wireController::class,'delete_transfer'])->middleware('auth','verified');
//message send
Route::post('/send-message',[messageController::class,'send_message'])->middleware('auth','verified');
//loan calculator route
Route::get('/loan-calculator',function(){
    return view('client.loancalc');
})->middleware('auth','verified');
//laon form submit
Route::post('/add-loan',[loanCotroller::class,'add_loan'])->middleware('auth','verified');
// laon form update 
Route::put('/update-loan/{id}',[loanCotroller::class,'update_loan'])->middleware('auth','verified');
// loan delete 
Route::get('/delete-loan/{id}',[loanCotroller::class,'delete_loan'])->middleware('auth','verified');
//loan review
Route::get('/loan-review/{id}',[loanCotroller::class,'preview_loan'])->middleware('auth','verified');
//make transfer
Route::post('/new-transfer',[transactionController::class,'new_transfer'])->middleware('auth','verified');
Route::get('/', [accountController::class,'show'])->middleware('auth','verified')->middleware('auth','verified');
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
})->middleware('auth','verified');
// cheques 
Route::get('/checkbook',function(){
    $account = session()->get('acc');
     $cheques = Cheque::Latest()->where('account_number','=',"$account")->get();
    return view('client.chechreq',compact('cheques'));
})->middleware('auth','verified');
Route::post('/req-check',[cheqController::class,'new_cheq']);
//choose account in accounts
 Route::get('/account/{id}',[accountController::class,'choose'])->middleware('auth','verified');
 //choose account in transactions
 Route::get('/transactions/{id}',[transactionController::class,'choose'])->middleware('auth','verified');
 //modify account alias
 Route::get('/account/alias/{id}',[accountController::class,'display_account'])->middleware('auth','verified');
 Route::put('/change-alias/{id}',[accountController::class,'change_alias'])->middleware('auth','verified');
 //filter in accounts
 Route::get('/filter/{id}',[accountController::class,'filtertrans'])->middleware('auth','verified');
 //filter in transactions
 Route::get('/filter-transfer/{id}',[transactionController::class,'filtertrans'])->middleware('auth','verified');

 Route::get('/filter-loan/{owner_id}',[loanCotroller::class,'filterloan'])->middleware('auth','verified');

 Route::get('/logout',[accountController::class,'logout']);
Route::get('/test',function(){
    return view('welcome');
});
//complain
Route::get('/complain',function(){
    $user = auth()->user()->id;
    $complains = Complain::latest()->where("complainer","=",$user)->get();
    return view('client.complain',compact('complains'));
});
//new complain
Route::post('/new-complain',[complainController::class,'new_complain']);
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
