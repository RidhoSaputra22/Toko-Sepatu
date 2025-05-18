<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Discount::all();
        return view('admin.discount.index', compact('datas'));
    }

    public function print(Request $request)
    {
        $datas = Discount::all();

        if($request->has('bulan') && $request->has('tahun')){
            $start_date = Carbon::parse($request->tahun.'-'.$request->input('bulan'))->startOfDay()->toDateString();
            $end_date = Carbon::parse($start_date)->endOfMonth()->toDateString(); 
            
            $datas = Discount::whereBetween('created_at', values: [$start_date, $end_date])->get();
            
        }

        return view('admin.discount.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.discount.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'kode' => 'required|string|max:20|unique:discount_222121,kode_222121',
            'diskon' => 'required|numeric|min:1|max:100',
            'batas' => 'required|numeric|min:1',
        ], [
            'kode.required' => 'Kode kupon harus diisi.',
            'kode.string' => 'Kode kupon harus berupa teks.',
            'kode.max' => 'Kode kupon maksimal 20 karakter.',
            'kode.unique' => 'Kode kupon sudah digunakan, silakan gunakan kode lain.',
            'diskon.required' => 'Diskon harus diisi.',
            'diskon.numeric' => 'Diskon harus berupa angka.',
            'diskon.min' => 'Diskon minimal adalah 1%.',
            'diskon.max' => 'Diskon maksimal adalah 100%.',
            'batas.required' => 'Batas waktu harus diisi.',
            'batas.min' => 'Batas minimal adalah 10,000.',
            
        ]);
        

        Discount::create([
            'kode_222121' => $request->kode,
            'discount_222121' => $request->diskon,
            'batas_222121' => $request->batas,
        ]);

        return redirect()->route('discount.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return view('admin.discount.show', compact('discount'));

    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        
        $request->validate([
            'kode' => 'required|string|max:20|',
            'discount' => 'required|numeric|min:1|max:100',
            'batas' => 'required|numeric|min:1',
        ], [
            'kode.required' => 'Kode kupon harus diisi.',
            'kode.string' => 'Kode kupon harus berupa teks.',
            'kode.max' => 'Kode kupon maksimal 20 karakter.',
            'kode.unique' => 'Kode kupon sudah digunakan, silakan gunakan kode lain.',
            'discount.required' => 'discount harus diisi.',
            'discount.numeric' => 'discount harus berupa angka.',
            'discount.min' => 'discount minimal adalah 1%.',
            'discount.max' => 'discount maksimal adalah 100%.',
            'batas.required' => 'Batas waktu harus diisi.',
            'batas.min' => 'Batas minimal adalah 10,000.',  
        ]);
        

        $discount->update([
            'kode_222121' => $request->kode,
            'discount_222121' => $request->discount,
            'batas_222121' => $request->batas,
        ]);

        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->back();
    }
}
