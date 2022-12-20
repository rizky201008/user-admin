<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Auth40Controller extends Controller
{
    public function indexLogin40() {
        return view('login');
    }

    public function storeLogin40(Request $request) {
        request()->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

        $credential = $request->only('email','password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            // check is_aktif
            if (!$user->is_aktif) {
                $request->session()->flush();
                Auth::logout();

                return redirect()
                    ->route('login40')
                    ->withInput()
                    ->withErrors(['error' => 'User is not activated yet by admin.']);
            }

            if ($user->role == 'Admin') {
                return redirect()->route('user40');
            } elseif ($user->role == 'User') {
                return redirect()->route('profile40');
            }

            return redirect()->route('welcome40');
        }

        return redirect()
            ->route('login40')
            ->withInput()
            ->withErrors(['error' => 'These credentials do not match our records.']);
    }

    public function indexRegister40() {
        return view('register');
    }

    public function storeRegister40(Request $request) {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User'
        ]);

        $user->detailData()->create([]);

        return redirect()
            ->route('login40')
            ->withInput();
    }

    public function logout40(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login40');
    }
}
