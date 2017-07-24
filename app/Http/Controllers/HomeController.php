<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Image;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $image = $user->images()->first();
        $role = $user->roles()->first();

        return view('dashboard',compact('image'));
        //return view('dashboard',compact(['image' => $image, 'roles' => $roles]));


        //return view('dashboard',compact(['image','role']));
    }

    public function home(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $image = $user->images()->first();
        return view('home',compact('image',$image));
    }
}
