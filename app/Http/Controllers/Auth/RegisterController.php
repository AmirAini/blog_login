<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    //request request is the transferred values (post)
    public function store(Request $request){
        
        //in controller has validate method
        $this->validate($request, [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed', //to check with confrimation
        ]);

        //database user 
        User::create([
            //insert values in columns
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //sign in
        auth()->attempt($request->only('password','email'));

        //change page
        return redirect()->route('dashboard');
    }
}
