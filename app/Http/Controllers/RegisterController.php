<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }


    public function index()
    {
       return view('auth.register');
    }
    public function store(Request $req){
        $this->validate($req, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|confirmed|min:5'
        ]);

        User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),

        ]);

        auth()->attempt($req->only('email', 'password'));
        return redirect()->route('dashboard');
    }
}
