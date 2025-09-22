<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function do_login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()
            ]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            /** @var \App\Models\User $user **/
            $user = auth()->user();

            return response()->json([
                'status' => 'ok',
                'token' => $user->createToken('myAppToken')->plainTextToken,
                'user' => $user
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Email atau password salah.'
        ]);
    }

    public function logout(Request $request)
    {
        // if ($request->user()->currentAccessToken()->delete()) {
            return response()->json([
                'status' => 'ok'
            ]);
        // }

        // return response()->json([
        //     'status' => 'failed',
        //     'message' => 'Gagal logout'
        // ]);
    }
}
