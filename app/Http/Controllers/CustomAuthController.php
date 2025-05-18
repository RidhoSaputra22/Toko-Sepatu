<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function userLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email_222121' => $request->email,
            'password' => $request->password,
        ])){
            $user = Auth::user();

            if($user['role_222121'] == 'admin'){
                return redirect('/admin/dashboard');
            }

            if($user['role_222121'] == 'user'){
                return redirect('/');
            }

        }

        return redirect('/login');

    }

    public function userRegist(Request $request){

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'nama_222121' => $request->nama,
            'alamat_222121' => $request->alamat,
            'email_222121' => $request->email,
            'password_222121' => Hash::make($request->password),
            'role_222121' => 'user',
            'foto_222121' => '',
        ]);

        return redirect('/login');

    }



    public function regist(){
        return view('auth.regist');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
