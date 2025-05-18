<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\WarnaController;
use Illuminate\Support\Facades\Route;

// HOME
    
    Route::get('/', [HomeController::class, 'index']);

        
            Route::get('/shop', [HomeController::class, 'shop']);
            Route::get('/detail/{id}', [HomeController::class, 'detail']);

    Route::middleware('auth')->group(function(){
        Route::get('/cart', [HomeController::class, 'cart']);
        Route::get('/checkout', [HomeController::class, 'checkout']);
        Route::get('/getToken', [HomeController::class, 'getToken']);
        Route::get('/riwayat', [HomeController::class, 'riwayat']);
        Route::get('/addToCart/{id}', [HomeController::class, 'addToCart']);
        Route::get('/addFormCart/{id}', [HomeController::class, 'addFormCart']);
        Route::get('/DelFormCart/{id}', [HomeController::class, 'DelFormCart']);
        Route::get('/DestroyFormCart/{id}', [HomeController::class, 'DestroyFormCart']);
    });


// END-HOME

// AUTH

    Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
    Route::post('/userLogin', [CustomAuthController::class, 'userLogin'])->name('user.login');
    Route::post('/userRegist', [CustomAuthController::class, 'userRegist'])->name('user.regist');
    Route::get('/regist', [CustomAuthController::class, 'regist']);
    Route::get('/logout', [CustomAuthController::class, 'logout']);
    

// END-AUTH

// ADMIN

    Route::middleware('Admin')->group(function() {

            Route::get('/print/produk', [ProdukController::class, 'print']);
            Route::get('/print/keranjang', [CartController::class, 'print']);
            Route::get('/print/discount', [DiscountController::class, 'print']);
            Route::get('/print/pelanggan', [PelangganController::class, 'print']);
            Route::get('/print/kategori', [CategoryController::class, 'print']);

            Route::resource('admin/dashboard', DashboardController::class);
            Route::resource('admin/kategori', CategoryController::class);
            Route::resource('admin/ukuran', UkuranController::class);
            Route::resource('admin/warna', WarnaController::class);
            Route::resource('admin/produk', ProdukController::class);
            Route::resource('admin/keranjang', CartController::class);
            Route::resource('admin/discount', DiscountController::class);
            Route::resource('admin/galleri', GalleryController::class);
            Route::resource('admin/pelanggan', PelangganController::class);

    });

// END-ADMIN