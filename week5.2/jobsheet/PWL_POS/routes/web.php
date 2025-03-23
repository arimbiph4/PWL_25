<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;



//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/public', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/',[UserController::class, 'index']);               //menampilkan halaman awal user
    Route::post('/list',[UserController::class, 'list']);           //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create',[UserController::class, 'create']);       //menampilkan halaman form tambah user
    Route::post('/',[UserController::class, 'store']);             //menyimpan data user baru
    Route::get('/{id}',[UserController::class, 'show']);           //menampilkan detail user
    Route::get('/{id}/edit',[UserController::class, 'edit']);      //menampilkan halaman form edit user
    Route::put('/{id}',[UserController::class, 'update']);         //menyimpan perubahan data user
    Route::delete('/{id}',[UserController::class, 'destroy']);     //menghapus data user
}); 

Route::group(['prefix' => 'level'], function () {   
    Route::get('/level', [LevelController::class, 'index']); // menampilkan halaman awal Level
    Route::post('/list', [LevelController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']); // menyimpan data level baru
    Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']); // menyimpan perubahan data level
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/list', [SupplierController::class, 'list'])->name('supplier.list');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal supplier
    Route::post('/list', [BarangController::class, 'list']); // menampilkan data supplier dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah supplier
    Route::post('/', [BarangController::class, 'store']); // menyimpan data supplier baru
    Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail supplier
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit supplier
    Route::put('/{id}', [BarangController::class, 'update']); // menyimpan perubahan data supplier
    Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data supplier

});



