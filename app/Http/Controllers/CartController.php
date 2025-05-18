<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cart::with('user', 'produk',  'discount')->get();
        
        return view('admin.keranjang.index', compact('datas'));
    }

    public function print(Request $request)
    {
        $datas = Cart::all();

        if($request->has('bulan') && $request->has('tahun')){
            $start_date = Carbon::parse($request->tahun.'-'.$request->input('bulan'))->startOfDay()->toDateString();
            $end_date = Carbon::parse($start_date)->endOfMonth()->toDateString(); 
            
            $datas = Cart::whereBetween('created_at', values: [$start_date, $end_date])->get();
            
        }

        return view('admin.keranjang.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = Cart::findOrFail($id);
        $data->update([
            'status_222121' => 'selesai',
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
