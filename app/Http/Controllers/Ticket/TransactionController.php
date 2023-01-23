<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction(){
        return view('ticket.staf-transaction');
    }

    public function transactionHistory(){
        return view('ticket.staf-transaction-history');
    }
}
