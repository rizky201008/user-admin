<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class Profile40Controller extends Controller
{
    public function index40() {
        $user = User::with('detailData')->findOrFail(Auth::user()->id);
        $religions = Agama::all();

        return view('user.profile', compact('user', 'religions'));
    }

    public function update40(Request $request) {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'religion' => 'nullable|exists:agama,id',
            'age' => 'nullable|numeric',
            'uploadKtp' => 'nullable|file|image|mimes:jpg,jpeg,png,webm'
        ]);

        $user = Auth::user();
        $user->update([ 'name' => $request->name ]);

        $data = [
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->religion,
            'umur' => $request->age
        ];

        if (isset($request->uploadKtp)) {
            $oldKtp = $user->detailData->foto_ktp;
            if (isset($oldKtp))
                File::delete('uploads/ktp/'.$oldKtp);

            $fileName = time().'-'.$user->id.'.'.$request->uploadKtp->extension();
            // $request->uploadKtp->storeAs('public/uploads/ktp/', $fileName);
            $request->uploadKtp->move(public_path('uploads/ktp/'), $fileName);

            $data['foto_ktp'] = $fileName;
        }

        $user->detailData()->update($data);

        return redirect()->back();
    }

    public function updateAvatar40(Request $request) {
        $user = Auth::user();

        $request->validate([
            'avatar' => 'required|file|image|mimes:jpg,jpeg,png,webm'
        ]); 

        $oldAvatar = $user->foto;
        if (isset($oldAvatar))
            File::delete('uploads/avatars/'.$oldAvatar);

        $fileName = time().'-'.$user->id.'.'.$request->avatar->extension();
        // $request->avatar->storeAs('public/uploads/avatars/', $fileName);
        $request->avatar->move(public_path('uploads/avatars/'), $fileName);

        $user->update([ 'foto' => $fileName ]);

        return redirect()->back();
    }

    public function updatePassword40(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_confirmation' => 'required|same:new_password'
        ]); 

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['old_password' => 'Old password did not match with current password']);
        }

        $user->update([ 'password' => Hash::make($request->new_password) ]);

        return redirect()->back();
    }
}