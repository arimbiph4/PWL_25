<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //tambah data user dengan Eloquent Model
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
            /*'username' => 'customer-1',
            'nama' => 'Manager',
            'password' => Hash::make('12345'),
            'level_id' => 4*/

        UserModel::where('username', 'customer 1')->update($data); //update data user

        //coba akses model UserModel
        $user = UserModel::all(); //ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}