<?php

use App\Http\Controllers\accountController;
use App\Http\Controllers\loanCotroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
// profile route 
Route::get('/profile',function(){
    return view('client.profile');
});
//loan calculator route
Route::get('/loan-calculator',function(){
    return view('client.loancalc');
});
Route::get('/', [accountController::class,'show'])->middleware('auth','verified');
Route::get('/transactions',function(){
    return view('client.transfer');
})->middleware('auth','verified');
Route::get('/wire',function(){
    return view('client.wire');
})->middleware('auth','verified');
Route::get('/loans',[loanCotroller::class,'show'])->middleware('auth','verified');
Route::get('/statement',function(){
    return view('client.statement');
})->middleware('auth','verified');
Route::get('/bill',function(){
    return view('client.bill');
})->middleware('auth','verified');
 Route::get('/account/{id}',[accountController::class,'choose'])->middleware('auth','verified');
 Route::get('/filter/{id}',[accountController::class,'filtertrans'])->middleware('auth','verified');
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
