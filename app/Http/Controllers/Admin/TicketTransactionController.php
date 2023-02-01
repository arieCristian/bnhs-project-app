<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CencelledTicketTransaction;
use App\Models\Role;
use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Illuminate\Http\Request;

class TicketTransactionController extends Controller
{
    public function index(){
        return view('ticket.admin-transaction');
    }

    public function TransactionHistory(){
        return view('ticket.transaction-history');
    }
    public function cencelled(){
        return view('ticket.admin-cencelled-transaction');
    }

    public function details(){
        return view('ticket.admin-transaction-detail');
    }
}
