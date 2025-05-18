<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = User::where('role_222121', '=', 'user')->get();
        return view('admin.pelanggan.index', compact('datas'));
    }

    public function print(Request $request)
    {
        $datas = User::where('role_222121', '=', 'user')->get();

        if($request->has('bulan') && $request->has('tahun')){
            $start_date = Carbon::parse($request->tahun.'-'.$request->input('bulan'))->startOfDay()->toDateString();
            $end_date = Carbon::parse($start_date)->endOfMonth()->toDateString(); 
            

            $datas = User::whereBetween('created_at', [$start_date, $end_date])->where('role_222121', '=', 'user')->get();
        }

        return view('admin.pelanggan.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:user_222121,email_222121',
            'password' => 'required|string|min:8',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'foto.required' => 'Foto harus diunggah.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, png, atau gif.',
            'foto.max' => 'Ukuran foto maksimal adalah 2MB.',
        ]);
        

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image/user'), $filename);
        $request->foto = 'image/user/' . $filename;

        User::create([
            'nama_222121' => $request->nama,
            'alamat_222121' => $request->alamat,
            'email_222121' => $request->email,
            'password_222121' => Hash::make($request->password),
            'role_222121' => 'user',
            'foto_222121' => $request->foto,

        ]);

        return redirect()->route('pelanggan.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(User $pelanggan)
    {   
        // dd($pelanggan);
        return view('admin.pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = User::findOrFail($id);


        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:user_222121,email_222121,' . $pelanggan['id_user_222121'] . ',id_user_222121',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'foto.required' => 'Foto harus diunggah.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, png, atau gif.',
            'foto.max' => 'Ukuran foto maksimal adalah 2MB.',
        ]);


       if($request->hasFile('foto')){
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image/user'), $filename);
            $request->foto = 'image/user/' . $filename;

            $pelanggan->update([
                'foto_222121' => $request->foto,
            ]);

       }

       $pelanggan->update([
            'nama_222121' => $request->nama,
            'alamat_222121' => $request->alamat,
            'email_222121' => $request->email,
        ]);


        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();
        return redirect()->back();

    }
}