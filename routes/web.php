<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\DanhmucController;
use App\Http\Controllers\Admin\ThuonghieuController;
use App\Http\Controllers\Trangchu\TrangchuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SanphamController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dangnhap', [AuthController::class, 'loginView'])->name('trang.dangnhap');
Route::post('/dangnhap', [AuthController::class, 'login']);
Route::middleware(['checklogin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dangxuat', [AuthController::class, 'logout'])->name('dangxuat');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('trang.dashboard');

        //Danh muc
        Route::prefix('danhmuc')->group(function(){
            Route::get('/danhsach', [DanhmucController::class, 'danhsach'])->name('danhsach.danhmuc');
            Route::get('/themmoi', [DanhmucController::class, 'viewThem'])->name('them.danhmuc');
            Route::post('/themmoi', [DanhmucController::class, 'them']);
            Route::get('/sua/{id}', [DanhmucController::class, 'show'])->name('sua.danhmuc');
            Route::post('/sua/{id}', [DanhmucController::class, 'sua']);
            Route::get('/xoa/{id}', [DanhmucController::class, 'xoa'])->name('xoa.danhmuc');
        });

        //Thương hiệu
        Route::prefix('thuonghieu')->group(function(){
            Route::get('/danhsach', [ThuonghieuController::class, 'danhsach'])->name('danhsach.thuonghieu');
            Route::get('/themmoi', [ThuonghieuController::class, 'viewThem'])->name('them.thuonghieu');
            Route::post('/themmoi', [ThuonghieuController::class, 'them']);
            Route::get('/sua/{id}', [ThuonghieuController::class, 'show'])->name('sua.thuonghieu');
            Route::post('/sua/{id}', [ThuonghieuController::class, 'sua']);
            Route::get('/xoa/{id}', [ThuonghieuController::class, 'xoa'])->name('xoa.thuonghieu');
        });

        //Sản phẩm
        Route::prefix('sanpham')->group(function(){
            Route::get('/danhsach', [SanphamController::class, 'danhsach'])->name('danhsach.sanpham');
            Route::get('/themmoi', [SanphamController::class, 'viewThem'])->name('them.sanpham');
            Route::post('/themmoi', [SanphamController::class, 'them']);
            Route::get('/sua/{id}', [SanphamController::class, 'show'])->name('sua.sanpham');
            Route::post('/sua/{id}', [SanphamController::class, 'sua']);
            Route::get('/xoa/{id}', [SanphamController::class, 'xoa'])->name('xoa.sanpham');
        });
    });
});

Route::get('/', [TrangchuController::class, 'trangchu'])->name('trangchu');
