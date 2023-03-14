<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LockerTransactionController extends Controller
{
    public function TransactionHistory(){
        return view('locker.transaction-history');
    }
    public function cencelled(){
        return view('locker.admin-cencelled-transaction');
    }

    public function details(){
        return view('locker.transaction-detail');
    }
}
