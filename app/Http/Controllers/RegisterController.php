<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman/view registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // DIUBAH: dari 'auth.register' menjadi 'register' agar sesuai dengan lokasi file Anda.
        return view('register');
    }

    /**
     * Menangani permintaan registrasi yang masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Jika validasi berhasil, buat pengguna baru.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. (Opsional) Langsung login-kan pengguna setelah berhasil mendaftar.
        Auth::login($user);

        // 4. Redirect pengguna ke halaman home atau dashboard.
        return redirect()->route('home');
    }
}
