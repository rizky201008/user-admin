<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\DetailData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserApi40Controller extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['message' => "Welcome to Api"]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'User'
        ]);

        $user->detailData()->create([]);

        return response()->json(
            [
                "message" => 'Register success'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $detail_user = DetailData::where('id_user', $request->user()->id)->first();
        return response()->json(
            [
                "message" => 'Success',
                "data" => $detail_user
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedetail(Request $request)
    {
        $detail_user = DetailData::where('id_user', $request->user()->id)->first();
        try {
            $update = $detail_user->update(
                [
                    "alamat" => $request->alamat ?? null,
                    "tempat_lahir" => $request->tempat_lahir ?? null,
                    "tanggal_lahir" => $request->tanggal_lahir ?? null,
                    "id_agama" => $request->id_agama ?? null,
                    "foto_ktp" => $request->foto_ktp ?? null,
                    "umur" => $request->umur ?? null
                ]
            );
            if ($update) {
                return response()->json(
                    [
                        "message" => 'Success',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        "message" => 'error'
                    ],
                    400
                );
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function updatepassword(Request $request)
    {
        $user = User::find($request->user()->id)->first();
        $request->validate(
            [
                "newpassword" => 'required',
                "confirmpassword" => 'required|same:newpassword'
            ]
        );
        $update = $user->update(
            [
                "password" => bcrypt($request->newpassword)
            ]
        );
        if ($update) {
            return response()->json(
                [
                    "message" => "New password saved! silahkan login ulang"
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => "Error!!!"
                ]
            );
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = DetailData::where('id_user', $request->user()->id)->first();
        try {
            $deleted = $delete->update(
                [
                    "alamat" => null,
                    "tempat_lahir" => null,
                    "tanggal_lahir" => null,
                    "id_agama" => null,
                    "foto_ktp" => null,
                    "umur" => null
                ]
            );
            if ($deleted) {
                return response()->json(
                    [
                        "message" => 'Success'
                    ]
                );
            } else {
                return response()->json(
                    [
                        "message" => 'Failed'
                    ]
                );
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function updateimage(Request $request)
    {
        if ($request->hasFile('profile')) {
            $store = $request->profile->store('images');
            return response()->json(
                [
                    "message"=>'success',
                    "data"=>$store
                ]
            );
        } else {
            return "Konthil";
        }
    }
}
