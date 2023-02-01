<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('ticket.transaction-history');
    }
    public function create(){
        return view('ticket.staf-transaction');
    }

    public function edit($id){
        $transaction = TicketTransaction::with('detail')->findOrFail($id);
        return view('ticket.staf-transaction-edit',compact('transaction'));
    }

    public function details(){
        return view('ticket.admin-transaction-detail');
    }

}
