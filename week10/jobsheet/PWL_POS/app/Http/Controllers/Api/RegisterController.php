<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:m_user,username',
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Simpan user baru
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => 2, // Default level_id kalau mau (sesuaikan dengan kebutuhanmu)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil!',
            'data' => $user
        ], 201);
    }
}
