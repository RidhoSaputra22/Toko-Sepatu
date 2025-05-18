<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'ukuran' => 'required|numeric|min:0||max:100|unique:ukuran_222121,ukuran_222121',
            'stok' => 'required|numeric|min:0',
            'id_produk' => 'required|integer|exists:produk_222121,id_produk_222121',
        ], [
            'stok.required' => 'Stok harus diisi.',
            'ukuran.max' => 'Stok tidak boleh lebih dari 100.',

            'ukuran.required' => 'Ukuran produk harus diisi.',
            'ukuran.string' => 'Ukuran produk harus berupa teks.',
            'ukuran.min' => 'Ukuran produk tidak boleh kurang dari 0.',
            'ukuran.unique' => 'Ukuran produk tidak boleh sama.',

            'id_produk.required' => 'ID produk harus diisi.',
            'id_produk.integer' => 'ID produk harus berupa angka.',
            'id_produk.exists' => 'ID produk tidak valid atau tidak ditemukan.',
        ]);
        
        Ukuran::create([
            'ukuran_222121' => $request->ukuran,
            'id_produk_222121' => $request->id_produk,
            'harga_222121' => $request->harga,
            'stok_222121' => $request->stok,
        ]);

        return redirect()->back();
    }

    public function show(Ukuran $ukuran){
        return view('admin.ukuran.show', compact('ukuran'));
    }

    public function update(Ukuran $ukuran, Request $request){
        $request->validate([
            'ukuran' => 'required|numeric|min:0||max:100|unique:ukuran_222121,ukuran_222121,' . $ukuran['id_ukuran_222121'] . ',id_ukuran_222121',
            'stok' => 'required|numeric|min:0',
            'id_produk' => 'required|integer|exists:produk_222121,id_produk_222121',
        ], [
            'stok.required' => 'Stok harus diisi.',
            'ukuran.max' => 'Stok tidak boleh lebih dari 100.',

            'ukuran.required' => 'Ukuran produk harus diisi.',
            'ukuran.string' => 'Ukuran produk harus berupa teks.',
            'ukuran.min' => 'Ukuran produk tidak boleh kurang dari 0.',
            'ukuran.unique' => 'Ukuran produk tidak boleh sama.',

            'id_produk.required' => 'ID produk harus diisi.',
            'id_produk.integer' => 'ID produk harus berupa angka.',
            'id_produk.exists' => 'ID produk tidak valid atau tidak ditemukan.',
        ]);

        $ukuran->update([
            'ukuran_222121' => $request->ukuran,
            'stok_222121' => $request->stok,
        ]);

        return redirect()->route('produk.show', $request->id_produk);

    }

    public function destroy(Ukuran $ukuran){
        $ukuran->delete();
        return redirect()->back();
    }

}
