<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Topupin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body {
        /* Pastikan path ini benar. Letakkan gambar di public/assets/other/Login.png */
        background-image: url("{{ asset('assets/other/Login.png') }}");
        background-size: cover;
        background-position: center;
        font-family: 'Inter', sans-serif;
      }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen flex items-center justify-center px-4 bg-gray-900">
    <div class="grid md:grid-cols-2 items-center w-full max-w-6xl">
      <!-- Left Text -->
      <div class="hidden md:flex flex-col text-white px-10">
        <h1 class="text-4xl md:text-5xl font-bold">SELAMAT DATANG DI</h1>
        <h2 class="text-4xl md:text-5xl font-bold">
          Topup<span class="text-lime-400">in</span>
        </h2>
      </div>

      <!-- Login Card -->
      <div class="bg-black/50 backdrop-blur-lg text-white w-full max-w-sm mx-auto rounded-2xl shadow-lg p-8 space-y-5">
        <h2 class="text-2xl font-bold">Masuk</h2>
        <p class="text-sm text-gray-300">Senang melihatmu kembali!</p>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf <!-- CSRF Token for security -->

            <!-- Email Input -->
            <div>
                <input
                    type="email"
                    name="email"
                    placeholder="Alamat Email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400"
                />
                <!--
                    Pesan error inline di sini sudah saya hapus
                    karena kita akan menggantinya dengan popup SweetAlert.
                -->
            </div>

            <!-- Password Input -->
            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Kata Sandi"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400"
                />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="accent-lime-400 h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-500"
                    />
                    <label for="remember">Ingat saya</label>
                </div>
                 <a href="#" class="text-gray-300 hover:underline">Lupa kata sandi?</a>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="block text-center w-full py-3 rounded-lg bg-lime-400 text-black font-semibold hover:bg-lime-300 transition"
            >
                Masuk
            </button>
        </form>

        <div class="flex items-center gap-2">
            <hr class="flex-grow border-gray-600" />
            <span class="text-gray-400 text-sm">atau masuk dengan</span>
            <hr class="flex-grow border-gray-600" />
        </div>

        <!-- Social Logins -->
        <div class="flex justify-center gap-4">
            <button class="p-2 bg-gray-700 rounded-full hover:bg-gray-600 transition">
                <img src="https://placehold.co/24x24/ffffff/000000?text=G" alt="Google" class="w-6 h-6 rounded-full" />
            </button>
            <button class="p-2 bg-gray-700 rounded-full hover:bg-gray-600 transition">
                <img src="https://placehold.co/24x24/ffffff/000000?text=F" alt="Facebook" class="w-6 h-6" />
            </button>
        </div>

        <p class="text-center text-sm text-gray-300">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-lime-400 hover:underline">Daftar</a>
        </p>
      </div>
    </div>

    <!-- 1. Include SweetAlert2 library from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- 2. Script to check for errors from Laravel and show the popup -->
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: 'Email atau password yang Anda masukkan salah. Silakan coba lagi.',
            confirmButtonColor: '#84cc16', // Warna tombol konfirmasi (lime-500)
            background: '#1f2937', // Warna background popup (gray-800)
            color: '#ffffff' // Warna teks popup (putih)
        });
    </script>
    @endif

</body>
</html>
