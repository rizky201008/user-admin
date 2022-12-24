<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Agama;
use App\Models\DetailData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminApi40Controller extends Controller
{
    public function index()
    {
        return response()->json(
            [
                "message" => 'Welcome to API'
            ]
        );
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $status = 200;
            $token = $request->user()->createToken('access_token')->plainTextToken;
            $response = [
                'message' => 'Login Success',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];
            return response($response, $status);
        } else {
            return response()->json([
                "message" => 'Invalid credentials',
            ], 400);
        }
    }
    public function createAgama(Request $request)
    {
        $create = Agama::create(
            [
                "nama_agama" => $request->agama
            ]
        );
        if ($create) {
            return response()->json(
                [
                    "message" => "Success",
                    "data" => Agama::orderBy('created_at', 'desc')->get()
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => 'Failed'
                ]
            );
        }
    }
    public function readAgama()
    {
        return response()->json(
            [
                "message" => "Success",
                "data" => Agama::all()
            ]
        );
    }
    public function updateAgama(Request $request)
    {
        $agama = Agama::find($request->agama_id);
        $update = $agama->update(
            [
                "nama_agama" => $request->agama
            ]
        );
        if ($agama) {
            return response()->json(
                [
                    "message" => 'Success',
                    "data" => $agama
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => 'Failed!!!'
                ]
            );
        }
    }
    public function deleteAgama(Request $request)
    {
        $agama = Agama::find($request->agama_id);
        $delete = $agama->delete();
        if ($delete) {
            return response()->json(
                [
                    "message" => 'Success',
                    "data" => Agama::all()
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => 'failed'
                ]
            );
        }
    }
    public function detailUser()
    {
        return response()->json(
            [
                "message" => "Success",
                "data" => DetailData::all()
            ]
        );
    }
    public function activation(Request $request)
    {
        $request->validate(
            [
                "email" => 'required',
                "status" => 'integer'
            ]
        );
        $user = User::where('email', $request->email)->first();
        $update = $user->update(
            [
                "is_aktif" => $request->status
            ]
        );
        if ($update) {
            return response()->json(
                [
                    "message" => 'Success',
                    "data" => $user
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => 'Failed'
                ]
            );
        }
    }
}
