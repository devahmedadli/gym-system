<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;

class authController extends Controller
{
   public static function login(Request $request) {

    $credentials    = $request->validate([

        "username"  => "required|min:4",
        "password"  => "required"
    ]);

    if(Auth::attempt($credentials)) {

        $request->session()->regenerate();
        session([
            "name"  => Auth::user()->full_name,
            "role"  => Auth::user()->role,
        ]);
        if (Auth::user()->role == "admin")
        {
            return redirect()->intended("admin/dashboard");
        }     
    }

    return back()->with("error", "Invalid Username Or Password");
    

   }
}