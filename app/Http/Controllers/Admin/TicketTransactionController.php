<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Illuminate\Http\Request;

class TicketTransactionController extends Controller
{
    public function index(){
        return view('ticket.admin-transaction');
    }
}
