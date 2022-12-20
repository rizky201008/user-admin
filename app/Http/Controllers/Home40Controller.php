<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home40Controller extends Controller
{
    public function index40() {
        if (!Auth::check()) 
            return redirect()->route('login40');
        else {
            $user = Auth::user();

            if($user->role == 'Admin')
                return redirect()->route('user40');
            else
                return redirect()->route('profile40');
        }
    }
}
