<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Gallery;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\Warna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Exception;

use function PHPUnit\Framework\returnValueMap;

class HomeController extends Controller
{
    public function index(){
        $datas = Produk::limit(4)->get();
        return view('home', compact('datas'));
    }
    public function riwayat(){
        $datas = Cart::where('id_user_222121', Auth::user()['id_user_222121'])->get();
        return view('riwayat', compact('datas'));
    }

    public function shop(Request $request){
        $datas = Produk::all();

        if($request->has('category')){
            $datas = Produk::where('id_category_222121', $request->category)->get();
        }
        if($request->has('search')){
            $datas = Produk::where('nama_222121', 'LIKE' ,'%'. $request->search . '%')->get();
        }



        $categories = Category::all();
        return view('shop', compact('datas', 'categories'));
    }

    public function cart(Request $request){

        $discount = null;

        if($request->has('ukuran') && $request->has('warna')){
            $cart = Cart::findOrFail($request->id);

            if($request->has('ukuran')){
                $this->UbahUkuran($cart, $request->ukuran);
            }
    
            if($request->has('warna')){
                $this->UbahWarna($cart, $request->warna);
            }

            $OnCart = Cart::where('id_user_222121', '=', Auth::user()['id_user_222121'])
                              ->where('id_produk_222121', '=', $request->produk)
                              ->where('status_222121', '=', 'belum')
                              ->where('id_ukuran_222121', $request->ukuran)
                              ->where('id_warna_222121', $request->warna)
                              ->get();
    

            if($OnCart->count() > 1){
                try{
                    $OnCart[0]->update([
                        'jumlah_222121' => ($OnCart[0]['jumlah_222121'] < $OnCart[0]->ukuran['stok_222121']) ?  $OnCart[0]['jumlah_222121'] + 1 : $OnCart[0]->ukuran['stok_222121'],
                    ]);

                    $OnCart[1]->delete();



                }catch(Exception $e){
                    
                }

                
            }


    
          
        }

      

        $datas = [
            'cart' => Cart::with('produk', 'ukuran')->where('id_user_222121', '=', Auth::user()['id_user_222121'])->where('status_222121', '=', 'belum'),
            'discount' => null,
            'total' => 0,
        ];

        $datas['total'] = $datas['cart']->sum('total_222121');

        if($request->has('discount') && $datas['cart']->get()->isNotEmpty()){
            $discount = Discount::where('kode_222121', '=', $request->discount)->get()->first();
            if(!empty($discount)){
                $datas['total'] = $datas['cart']->sum('total_222121') -  ($datas['cart']->sum('total_222121') * ($discount['discount_222121'] / 100)) ; 

                $datas['cart']->update([
                    'id_discount_222121' => $discount['id_discount_222121'],

                ]);
            }
        }

        $datas['cart'] = $datas['cart']->get();
        $datas['discount'] = Discount::where('batas_222121', '<', $datas['total'])->get();


        
      
        return view('cart', compact('datas', 'request', 'discount'));
            
    }

    public function UbahUkuran(Cart $cart, $ukuran){
 

        $data = Ukuran::findOrFail($ukuran);
        $stok = $data['stok_222121'];

        if($cart['jumlah_222121'] > $stok){            
            $cart->update([
                'jumlah_222121' => 1
            ]);
        }

        $cart->update([
            'id_ukuran_222121' => $ukuran,
        ]);

    }
    public function Ubahwarna(Cart $cart, $warna){
 

        $cart->update([
            'id_warna_222121' => $warna,
        ]);


    }

    public function checkout(){

      
        $cart = Cart::with('ukuran')->where('id_user_222121', '=', Auth::user()['id_user_222121'])
        ->where('status_222121', '=', 'belum')->get();

        $kode = Str::random(10);

        foreach($cart as $data){

            $data->ukuran->update([
                'stok_222121' => $data->ukuran['stok_222121'] - $data['jumlah_222121']
            ]);
            
            $data->update([
                'status_222121' => 'checkout',
                'kode_222121' => $kode
            ]);

        }

        return redirect('/riwayat');

    }

    public function getToken(Request $request){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-RLFb97kMYFCKU6wI9wDN8KHH';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if($request->total != 0){
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $request->total,
                )
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return redirect()->back()->with('token',$snapToken);
        }else{
            return redirect()->back()->with('error','Tak Ada Barang Di Keranjang');
        }
    }
    
    public function DelFormCart($id){

        $cart = Cart::findOrFail($id);
        $jumlahAwal = $cart['jumlah_222121'];
        $jumlahAkhir = $jumlahAwal - 1;
        $total = $cart->produk['harga_222121'] * $jumlahAkhir;

        if($jumlahAkhir == 0){
            $cart->delete();
        }else{
            $cart->update([
                'jumlah_222121' => $jumlahAkhir,
                'total_222121' => $total,
            ]);
        }

        return redirect('/cart');

    }
    public function AddFormCart($id){

        $cart = Cart::findOrFail($id);
        $jumlahAwal = $cart['jumlah_222121'];
        $jumlahAkhir = $jumlahAwal + 1;
        $total = $cart->produk['harga_222121'] * $jumlahAkhir;

        if($jumlahAkhir >= $cart->ukuran['stok_222121']){
            return redirect('/cart')->with('error', 'Stok tidak cukup');
        }else{
            $cart->update([
                'jumlah_222121' => $jumlahAkhir,
                'total_222121' => $total,
            ]);
        }

        return redirect('/cart');

    }
    public function addToCart(Request $request, $id){

        
        $request->validate([
            'jumlah' => 'required|numeric|Min:1',
            'ukuran' => 'required',
            'warna' => 'required',
        ]);
        
        $produk = Produk::findOrFail($id);
        $ukuran = Ukuran::find($request->ukuran) ?? $produk->ukuran[0];
        $warna = Warna::find($request->warna) ?? $produk->warna[0];
        

        $data = Cart::where('id_produk_222121', '=', $id)
        ->where('id_user_222121', '=', Auth::user()['id_user_222121'])
        ->where('id_ukuran_222121', '=', $request->ukuran)
        ->where('id_warna_222121', '=', $request->warna)
        ->where('status_222121', '=', 'belum')->get();

        $isOnCart = $data->isNotEmpty();


        // dump($request->all(), $warna);

        if(Auth::check() ){
            if($isOnCart){
                $cart = $data->first();
                $jumlahAwal = $cart['jumlah_222121'];
                $jumlahAkhir = ($request->has('jumlah')) ?  $jumlahAwal + $request->jumlah : $jumlahAwal + 1 ;
                $jumlahAkhir = ($jumlahAkhir >= $ukuran['stok_222121']) ? $ukuran['stok_222121'] : $jumlahAkhir;
                $total = $produk['harga_222121'] * $jumlahAkhir;
    
                if($jumlahAkhir == 0){
                    $cart->delete();
                }else{
                    $cart->update([
                        'jumlah_222121' => $jumlahAkhir,
                        'total_222121' => $total,
                    ]);
                }

            }else{

                Cart::create([
                    'id_produk_222121' => $id,
                    'id_user_222121' => Auth::user()['id_user_222121'],
                    'id_ukuran_222121' =>  $ukuran['id_ukuran_222121'] ,
                    'id_warna_222121' =>  $warna['id_warna_222121'] ,
                    'id_discount_222121' => null,
                    'jumlah_222121' => $request->jumlah,
                    'total_222121' => $produk['harga_222121'] * $request->jumlah,
                    'kode_222121' => 0,
                    'status_222121' => 'belum',
                ]);

                
            }
            
        }else{
            return redirect('/login');
        }

        return redirect('/cart');

    }



    public function DestroyFormCart($id){
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect('/cart');
    }

    public function detail(Request $request, $id){
        
        $datas = Produk::with('ukuran')->findOrFail($id);

        // dd((old('ukuran')));
        
        return view('detail', compact('datas', 'request'));
    }




}