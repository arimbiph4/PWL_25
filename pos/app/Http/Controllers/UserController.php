<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel; // pastikan model di-import
use Illuminate\Support\Facades\Hash; // penting untuk Hash::make

class UserController extends Controller
{
    public function index()
    {
        // ambil semua data user + relasi level (jika ada)
        $data = UserModel::with('level')->get(); // jika kamu punya relasi 'level'

        return view('user', ['data' => $data]);
    }

    public function tambah()
    {
        // tampilkan form tambah user
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        // contoh data update
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];

        // update data user dengan username 'customer-1'
        UserModel::where('username', 'customer-1')->update($data);

        // redirect setelah update
        return redirect('/user')->with('success', 'Data user berhasil diupdate!');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user')->with('success', 'Data user berhasil diubah!');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'Data user berhasil dihapus!');
    }
}
