<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/pengelola');
            } else if (Auth::user()->role == 'owner') {
                return redirect('/owner');
            } else {
                return redirect('/user-home');
            }
        } else {
            return redirect('/login')->withErrors('Username dan Password tidak sesuai')->withInput();
            // return redirect()->back()->withErrors(['email' => 'Email atau kata sandi salah.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'address.required' => 'Alamat wajib diisi',
        ]);

        // Membuat user baru dengan password yang di-hash menggunakan bcrypt
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Menggunakan bcrypt langsung
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }
}
