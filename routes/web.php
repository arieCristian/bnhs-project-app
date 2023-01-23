<?php

use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\TicketTransactionController;
use App\Http\Controllers\Auth\LoginController;
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
   Route::resource('/ticket',AdminTicketController::class);
   Route::get('/ticket-transaction',[TicketTransactionController::class,'index']);
});

/* TICKET STAF ROUTE */
Route::middleware('ticket')->prefix('ticket')->group(function () {
   Route::get('/transaction',[TransactionController::class,'transaction']);
   Route::get('/transaction-history',[TransactionController::class,'transactionHistory']);
});
