<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($req->only('email', 'password'), $req->remember)){
            return back()->with('status', 'Invalid Login Details');
        }
        return redirect()->route('dashboard');
        
    }
    
}
