<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->intended('/dashboard');
        }else{
            return view('login', [
                'title' => 'login'
            ]);
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function dashboard(){
        if(auth()->user()->role_id == Role::IS_OWNERS){
            return view('dashboard.owner');
        }elseif(auth()->user()->role_id == Role::IS_ADMIN){
            return view('dashboard.admin');
        }elseif(auth()->user()->role_id == Role::IS_BAR){
            return view('dashboard.bar');
        }elseif(auth()->user()->role_id == Role::IS_TICKET){
            return view('dashboard.ticket');
        }elseif(auth()->user()->role_id == Role::IS_LOCKER){
            return view('dashboard.locker');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
