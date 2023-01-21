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
        $tr = TicketTransaction::first();
        $td = TicketTransactionDetail::first();
        $role = Role::first();
        dd($td->ticket);
    }
}
