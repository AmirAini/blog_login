<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'email'=>'required|email|',
            'password'=>'required', //to check with confrimation
        ]);

        //authenticate
        if (!auth()->attempt($request->only('password','email'))){
            return back()->with('status','invalid details');
        }

        //redirect
        return redirect()->route('dashboard');
    }
}
