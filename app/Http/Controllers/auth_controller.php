<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class auth_controller extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }
    public function login_form(Request $data){
        $credentials = $data->validate([
            'name' => 'required|min:4|max:20',
            'password' => 'required|min:4|max:20',
              ]);
    
        
              if (Auth::attempt($credentials)) {
                $data->session()->regenerate();

                return redirect()->intended('home');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);

    }
}
