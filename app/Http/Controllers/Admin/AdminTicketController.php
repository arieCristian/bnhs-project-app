<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{

    public function index()
    {
        return view('ticket.admin-ticket-data');
    }
}
