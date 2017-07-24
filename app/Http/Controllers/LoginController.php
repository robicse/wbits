<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use App\Image;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function login(Request $request){
        //dd($request->all());

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email', $request->email)->first();
            $role = $user->roles()->first();
            if($role->name == "Admin")
            {
                return redirect()->route('dashboard');
            }
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
}
