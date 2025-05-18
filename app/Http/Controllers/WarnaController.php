<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use App\Http\Requests\StoreWarnaRequest;
use App\Http\Requests\UpdateWarnaRequest;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {

        $request->validate([
            'warna' => 'required|string|max:50|unique:warna_222121,warna_222121',
            'id_produk' => 'required|integer|exists:produk_222121,id_produk_222121',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'warna.unique' => 'Warna produk tak boleh sama',
            'warna.required' => 'Warna produk harus diisi.',
            'warna.string' => 'Warna produk harus berupa teks.',
            'warna.max' => 'Warna produk maksimal 50 karakter.',
            'id_produk.required' => 'ID produk harus diisi.',
            'id_produk.integer' => 'ID produk harus berupa angka.',
            'id_produk.exists' => 'ID produk tidak valid atau tidak ditemukan.',
            'foto.required' => 'Foto produk harus diunggah.',
            'foto.image' => 'Foto produk harus berupa gambar.',
            'foto.mimes' => 'Foto produk harus berformat jpg, jpeg, png, atau gif.',
            'foto.max' => 'Foto produk maksimal berukuran 2MB.',
        ]);
        

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image/produk'), $filename);

        Warna::create([
            "warna_222121" => $request->warna,
            "id_produk_222121" => $request->id_produk,
            "foto_222121" => 'image/produk/' . $filename,
        ]);

        return redirect()->back()->with('sukses_warna', "Data Berhasil Ditambah");


    }

    /**
     * Display the specified resource.
     */
    public function show(Warna $warna)
    {
        return view('admin.warna.show', compact('warna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warna $warna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warna $warna)
    {
        $request->validate([
            'warna' => 'required|string|max:50|unique:warna_222121,warna_222121,' . $warna['id_warna_222121'] . ',id_warna_222121',
            'id_produk' => 'required|integer|exists:produk_222121,id_produk_222121',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'warna.unique' => 'Warna produk tak boleh sama',
            'warna.required' => 'Warna produk harus diisi.',
            'warna.string' => 'Warna produk harus berupa teks.',
            'warna.max' => 'Warna produk maksimal 50 karakter.',
            'id_produk.required' => 'ID produk harus diisi.',
            'id_produk.integer' => 'ID produk harus berupa angka.',
            'id_produk.exists' => 'ID produk tidak valid atau tidak ditemukan.',
            'foto.required' => 'Foto produk harus diunggah.',
            'foto.image' => 'Foto produk harus berupa gambar.',
            'foto.mimes' => 'Foto produk harus berformat jpg, jpeg, png, atau gif.',
            'foto.max' => 'Foto produk maksimal berukuran 2MB.',
        ]);
        

        
        if($request->has('foto')){
            
            $file = $request->file('foto');            
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image/produk'), $filename);
            
            $warna->update([
                "foto_222121" => 'image/produk/' . $filename,
            ]);
        }
        
        $warna->update([
            "warna_222121" => $request->warna,
            "id_produk_222121" => $request->id_produk,
        ]);
        
        return redirect()->back()->with('sukses_warna', "Data Berhasil Diupdate");
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warna $warna)
    {
        //
    }
}
