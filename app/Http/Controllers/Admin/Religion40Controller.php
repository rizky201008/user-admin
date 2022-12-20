<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Religion40Controller extends Controller
{
    public function index40() {
        $religions = Agama::all();

        return view('admin.religions.index', compact('religions'));
    }

    public function create40() {
        return view('admin.religions.create');
    }

    public function store40(Request $request) {
        $request->validate([
            'religion_name' => 'required'
        ]);

        Agama::create([
            'nama_agama' => $request->religion_name
        ]);

        return redirect()->route('religion40');
    }

    public function edit40($id) {
        $religion = Agama::findOrFail($id);

        return view('admin.religions.edit', compact('religion'));
    }

    public function update40(Request $request, $id) {
        $request->validate([
            'religion_name' => 'required'
        ]);

        $religion = Agama::findOrFail($id);

        $religion->update([
            'nama_agama' => $request->religion_name
        ]);

        return redirect()->route('religion40');
    }

    public function delete40($id) {
        $religion = Agama::findOrFail($id);

        $religion->delete();
        return redirect()->back();
    }
}