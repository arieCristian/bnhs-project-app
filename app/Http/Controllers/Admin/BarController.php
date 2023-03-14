<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarController extends Controller
{
    public function index (){
        return view('bar.admin-bar-data');
    }
}
