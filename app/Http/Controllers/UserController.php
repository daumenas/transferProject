<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function home()
    {
        $user = Auth::id();

        $user2 = User::where('id', $user)->get();

        return view('welcome')->with('users', $user2);
    }



}
