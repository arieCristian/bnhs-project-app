<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function index()
    {
        return view('locker.admin-locker-data');
    }
}
