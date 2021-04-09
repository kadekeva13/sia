<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }
    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' =>['required', 'string', 'min:6', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if(Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('succes', "Ubah Password Berhasil");


        } else {
            return back()->withErrors(['old_password' => 'Password Belum Sesuai']);
        }

        
    }
}
