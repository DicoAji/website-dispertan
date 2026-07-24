<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk enkripsi
use App\Models\User; // Tambahkan ini untuk memanggil tabel users

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    // ... (Fungsi index, prosesLogin, dan logout biarkan seperti sebelumnya) ...
    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Jika email dan sandi cocok dengan database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Arahkan ke halaman admin
            return redirect()->intended('/admin');
        }

        // Jika gagal masuk, kembalikan dengan pesan error
        return back()->with('error', 'Keterangan input salah! Email atau kata sandi tidak cocok.')->onlyInput('email');
    }

    // Menampilkan halaman form pendaftaran
    // public function register()
    // {
    //     return view('auth.register');
    // }

    // // Memproses data pendaftaran akun baru
    // public function prosesRegister(Request $request)
    // {
    //     // 1. Validasi data yang diinput
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'min:8', 'confirmed'], // confirmed butuh input password_confirmation
    //     ], [
    //         'name.required' => 'Nama lengkap wajib diisi.',
    //         'email.required' => 'Email wajib diisi.',
    //         'email.unique' => 'Email ini sudah terdaftar di sistem.',
    //         'password.required' => 'Kata sandi wajib diisi.',
    //         'password.min' => 'Kata sandi minimal 8 karakter.',
    //         'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
    //     ]);

    //     // 2. Simpan data ke database dengan enkripsi otomatis
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password), // Enkripsi Bcrypt otomatis
    //     ]);

    //     // 3. Arahkan kembali ke halaman login dengan pesan sukses
    //     return redirect('/login')->with('sukses', 'Akun berhasil dibuat! Silakan masuk.');
    // }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
