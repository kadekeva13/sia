<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
    public function postlogin (Request $request){
       // dd($request->all());
       if (Auth::attempt($request->only('email','password'))){
           return redirect('/beranda');
       }
       return redirect('login');
    }
    public function getRegister()
    {
        return view('/register');
    }
    
    public function lupapassword()
    {
        return view('pengguna.lupa-password');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'level' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed' // field_confirmation
        ]);
       User::create([
           'name' => $request->name,
           'level' => $request->level,
           'email' => $request->email,
           'password' => bcrypt($request->password)
       ]);

       return redirect()->route('login');
    }
    public function logout (Request $request){
        Auth::logout();
        return redirect('/');
     }
}
