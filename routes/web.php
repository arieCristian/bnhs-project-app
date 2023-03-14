<?php

use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\BarController;
use App\Http\Controllers\Admin\BarTransactionController;
use App\Http\Controllers\Admin\LockerController;
use App\Http\Controllers\Admin\LockerTransactionController as AdminLockerTransactionController;
use App\Http\Controllers\Admin\TicketTransactionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Bar\TransactionController as ControllersBarTransactionController;
use App\Http\Controllers\Locker\TransactionController as LockerTransactionController;
use App\Http\Controllers\Ticket\TransactionController;
use Illuminate\Support\Facades\Route;

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

/* LOGIN ROUTE */
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/dashboard',[LoginController::class,'dashboard'])->name('login');


/* ADMIN ROUTE */
Route::middleware('admin')->prefix('admin')->group(function () {
   Route::get('/ticket/data',[AdminTicketController::class,'index']);
   Route::get('/ticket/transactions-history',[TicketTransactionController::class,'transactionHistory']);
   Route::get('/ticket/cencelled-transactions',[TicketTransactionController::class,'cencelled']);
   Route::get('/ticket/transactions-details',[TicketTransactionController::class,'details']);

   /* LOCKER ROUTE */
   Route::prefix('locker')->group(function(){
      Route::get('data',[LockerController::class,'index']);
      Route::get('transactions-history',[AdminLockerTransactionController::class,'transactionHistory']);
      Route::get('cencelled-transactions',[AdminLockerTransactionController::class,'cencelled']);
      Route::get('transactions-details',[AdminLockerTransactionController::class,'details']);
   });

   /* BAR ROUTE */
   Route::prefix('bar')->group(function(){
      Route::get('data',[BarController::class,'index']);
      Route::get('transactions-history',[BarTransactionController::class,'transactionHistory']);
      Route::get('cencelled-transactions',[BarTransactionController::class,'cencelled']);
      Route::get('transactions-details',[BarTransactionController::class,'details']);
   });
});

/* TICKET STAF ROUTE */
Route::middleware('ticket')->prefix('ticket')->group(function () {
   Route::resource('/transaction',TransactionController::class)->except(['show','store','destroy']);
   Route::get('/transactions-details',[TransactionController::class,'details']);
});

/* TICKET STAF ROUTE */
Route::middleware('locker')->prefix('locker')->group(function () {
   Route::resource('/transaction',LockerTransactionController::class)->except(['store','destroy']);
   Route::get('/transactions-details',[LockerTransactionController::class,'details']);
   Route::get('/transactions-history',[LockerTransactionController::class,'history']);
});

/* BAR STAF ROUTE */
Route::middleware('bar')->prefix('bar')->group(function () {
   Route::resource('/transaction',ControllersBarTransactionController::class)->except(['store','destroy']);
   Route::get('/transactions-details',[ControllersBarTransactionController::class,'details']);
   Route::get('/transactions-history',[ControllersBarTransactionController::class,'history']);
});
