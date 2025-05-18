<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Category::all();
        return view('admin.kategori.index', compact('datas'));
    }
    public function print(Request $request)
    {
        $datas = Category::all();

        
        if($request->has('bulan') && $request->has('tahun')){
            $start_date = Carbon::parse($request->tahun.'-'.$request->input('bulan'))->startOfDay()->toDateString();
            $end_date = Carbon::parse($start_date)->endOfMonth()->toDateString(); 
            
            $datas = Category::whereBetween('created_at', [$start_date, $end_date])->get();
        }

        return view('admin.kategori.print', compact('datas', 'request'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:category_222121,category_222121',
        ], [
            'nama.unique' => 'Nama kategori sudah ada dalam database',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 100 karakter.',
        ]);
        


        Category::create([
            'category_222121' => $request->nama,
        ]);

        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $kategori)
    {

        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:category_222121,category_222121,' . $kategori['id_category_222121'] . ',id_category_222121',
        ], [
            'nama.unique' => 'Nama kategori sudah ada dalam database',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 100 karakter.',
        ]);

        $kategori->update([
            'category_222121' => $request->nama,
        ]);

        return redirect()->route('kategori.index');   
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Category $kategori)
    {
        // dd($kategori);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
