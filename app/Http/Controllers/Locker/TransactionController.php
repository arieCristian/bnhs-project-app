<?php

namespace App\Http\Controllers\Locker;

use App\Http\Controllers\Controller;
use App\Models\LockerTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('locker.staf-transaction-unpaid');
    }
    public function create(){
        return view('locker.staf-transaction');
    }

    public function edit($id){
        $transaction = LockerTransaction::with('detail')
        ->where('paid',false)
        ->findOrFail($id);
        return view('locker.staf-transaction-edit',compact('transaction'));
    }

    public function history(){
        return view('locker.transaction-history');
    }
    public function details(){
        return view('locker.transaction-detail');
    }
}
