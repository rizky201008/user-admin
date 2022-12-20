<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User40Controller extends Controller
{
    public function index40() {
        $users = User::where('role', '!=', 'Admin')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    public function detail40($id) {
        $user = User::with('detailData', 'detailData.agama')->findOrFail($id);

        return view('admin.users.detail', compact('user'));
    }

    public function approve40($id) {
        $user = User::findOrFail($id);

        $user->update([ 'is_aktif' => true ]);

        return redirect()->back();
    }
}