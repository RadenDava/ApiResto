<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //* ini function login jink
    public function login(Request $request) {

        //! INI Mem validasi jika email dan password harus di ISI!
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //! Mencocokan email dgn yg ada di DB
        $user = User::where('email', $request->email)->first();

        //! Stlah di Cocokan, JIKA TIDAK ADA USERNYA DI DATABASE MAKA KITA BERI Messages
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Password or email salah'],
            ]);
        }

        unset($user->email_verified_at);
        unset($user->created_at);
        unset($user->updated_at);
        unset($user->deleted_at);

        //!Menghapus Token yg sdh di pake menjadi expired
        $user->tokens()->delete();

        //! Jika inputan sama dgn data di DB, maka di buatin Token Khusus.. skaligus menggabungkan data $user dan token
        $token = $user->createToken('sanctum')->plainTextToken;
        $user->token = $token;
        return response(['data' => $user]);

    }


    //*Ini fuction me
    public function me(){
        return response(['data' => auth()->user()]);
    }
}
