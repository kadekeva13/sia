<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
         $data = User::all();
        return view('profil.halaman-profile', $data);
    }

    public function editprofile() {
        $data = User::all();
        return view('profil.edit-profile', $data);
    }
}
