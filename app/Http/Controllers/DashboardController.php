<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $datas = [
            'jumlah_produk' => Produk::count(),
            'jumlah_pelanggan' => User::count(),
            'produk_dipesan' => Cart::count(),
            'cart' => Cart::with('user', 'produk',  'discount')->get(),
        ];
        return view('admin.dashboard.index', compact('datas'));
    }
}
