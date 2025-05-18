<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Ukuran;
use App\Models\Warna;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Produk::all();
        return view('admin.produk.index', compact('datas'));
    }
    public function print(Request $request)
    {
        $datas = Produk::all();

        if($request->has('bulan') && $request->has('tahun')){
            $start_date = Carbon::parse($request->tahun.'-'.$request->input('bulan'))->startOfDay()->toDateString();
            $end_date = Carbon::parse($start_date)->endOfMonth()->toDateString(); 
            
            $datas = Produk::whereBetween('created_at', [$start_date, $end_date])->get();
        }

        return view('admin.produk.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all();
        return view('admin.produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nama' => 'required|string|max:100|unique:produk_222121,nama_222121',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:500',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ukuran' => 'required|string|max:10',
            'stok' => 'required|integer|min:1',
            'kategori' => 'required|exists:category_222121,id_category_222121',
            'warna' => 'required|string|max:50',
            'warna_foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nama.required' => 'Nama produk harus diisi.',
            'nama.string' => 'Nama produk harus berupa teks.',
            'nama.max' => 'Nama produk maksimal 100 karakter.',
            'harga.required' => 'Harga produk harus diisi.',
            'harga.numeric' => 'Harga produk harus berupa angka.',
            'harga.min' => 'Harga produk tidak boleh kurang dari 0.',
            'deskripsi.required' => 'Deskripsi produk harus diisi.',
            'deskripsi.string' => 'Deskripsi produk harus berupa teks.',
            'deskripsi.max' => 'Deskripsi produk maksimal 500 karakter.',
            'foto.required' => 'Foto produk harus diunggah.',
            'foto.image' => 'Foto produk harus berupa gambar.',
            'foto.mimes' => 'Foto produk harus berformat jpg, jpeg, png, atau gif.',
            'foto.max' => 'Foto produk maksimal berukuran 2MB.',
            'ukuran.required' => 'Ukuran produk harus diisi.',
            'ukuran.string' => 'Ukuran produk harus berupa teks.',
            'ukuran.max' => 'Ukuran produk maksimal 10 karakter.',
            'stok.required' => 'Stok produk harus diisi.',
            'stok.integer' => 'Stok produk harus berupa bilangan bulat.',
            'stok.min' => 'Stok produk minimal 1.',
            'kategori.required' => 'Kategori produk harus diisi.',
            'kategori.exists' => 'Kategori produk tidak valid.',
            'warna.required' => 'Warna produk harus diisi.',
            'warna.string' => 'Warna produk harus berupa teks.',
            'warna.max' => 'Warna produk maksimal 50 karakter.',
            'warna_foto.required' => 'Foto warna produk harus diunggah.',
            'warna_foto.image' => 'Foto warna produk harus berupa gambar.',
            'warna_foto.mimes' => 'Foto warna produk harus berformat jpg, jpeg, png, atau gif.',
            'warna_foto.max' => 'Foto warna produk maksimal berukuran 2MB.',
        ]);
        

        

        

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image/produk'), $filename);
        // $request['foto'] = $filename;    

        $file_warna = $request->file('warna_foto');
        $filename_wanrna = time() . '.' . $file_warna->getClientOriginalExtension();
        $file_warna->move(public_path('image/produk'), $filename_wanrna);
        // $request['warna_foto'] = $filename;    

        $produk = Produk::create([
            'nama_222121' => $request->nama,
            'harga_222121' => $request->harga,
            'deskripsi_222121' => $request->deskripsi,
            'thumbnail_222121' => 'image/produk/'. $filename,
            'id_category_222121' => $request->kategori,
        ]);

        Ukuran::create([
            'ukuran_222121' => $request->ukuran,
            'stok_222121' => $request->stok,
            'id_produk_222121' => $produk['id_produk_222121'],
        ]); 

        Warna::create([
            'warna_222121' => $request->warna,
            'id_produk_222121' => $produk['id_produk_222121'],
            'foto_222121' => 'image/produk/'.  $filename_wanrna,
        ]);

        return redirect()->route('produk.index');




    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {   
        // $galleri = Gallery::where('id_produk_222121', '=', $produk['id_produk_222121'])->get();
        // dd($produk->gallery);
        $kategori = Category::all();

        return view('admin.produk.show', compact('produk', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {

        $request->validate([
            'nama' => 'required|string|max:100|unique:produk_222121,nama_222121,'. $produk['id_produk_222121'] . ',id_produk_222121',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:500',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'kategori' => 'required|exists:category_222121,id_category_222121',
          
        ], [
            'nama.required' => 'Nama produk harus diisi.',
            'nama.string' => 'Nama produk harus berupa teks.',
            'nama.max' => 'Nama produk maksimal 100 karakter.',
            'harga.required' => 'Harga produk harus diisi.',
            'harga.numeric' => 'Harga produk harus berupa angka.',
            'harga.min' => 'Harga produk tidak boleh kurang dari 0.',
            'deskripsi.required' => 'Deskripsi produk harus diisi.',
            'deskripsi.string' => 'Deskripsi produk harus berupa teks.',
            'deskripsi.max' => 'Deskripsi produk maksimal 500 karakter.',
            'foto.required' => 'Foto produk harus diunggah.',
            'foto.image' => 'Foto produk harus berupa gambar.',
            'foto.mimes' => 'Foto produk harus berformat jpg, jpeg, png, atau gif.',
            'foto.max' => 'Foto produk maksimal berukuran 2MB.',
            'kategori.required' => 'Kategori produk harus diisi.',
            'kategori.exists' => 'Kategori produk tidak valid.',
            
        ]);
        


        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image/produk'), $filename);
            
            $produk->update([
                'thumbnail_222121' => 'image/produk/' . $filename,
            ]);
        }


        $produk->update([
            'nama_222121' => $request->nama,
            'harga_222121' => $request->harga,
            'deskripsi_222121' => $request->deskripsi,
            'id_category_222121' => $request->kategori,
        ]);



        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {   
        // dd($produk);
        $produk->delete();
        return redirect()->back();
    }
}
