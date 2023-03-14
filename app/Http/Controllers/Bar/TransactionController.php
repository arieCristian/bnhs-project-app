<?php

namespace App\Http\Controllers\Bar;

use App\Http\Controllers\Controller;
use App\Models\BarTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('bar.staf-transaction-unpaid');
    }
    public function create(){
        return view('bar.staf-transaction');
    }

    public function edit($id){
        $transaction = BarTransaction::with('detail')
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
