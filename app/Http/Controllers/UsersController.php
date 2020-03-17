<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function pagination ()
    {
        $users = User::all();
        return view('pagination', compact('users'));
    }
}
