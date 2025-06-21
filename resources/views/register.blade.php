<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Akun - Topupin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body {
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
        <h1 class="text-4xl md:text-5xl font-bold">BUAT AKUN BARU</h1>
        <h2 class="text-4xl md:text-5xl font-bold">
          Di Topup<span class="text-lime-400">in</span>
        </h2>
      </div>

      <!-- Register Card -->
      <div class="bg-black/50 backdrop-blur-lg text-white w-full max-w-sm mx-auto rounded-2xl shadow-lg p-8 space-y-4">
        <h2 class="text-2xl font-bold">Daftar</h2>
        <p class="text-sm text-gray-300">Selamat datang! Silakan isi data Anda.</p>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">

            @csrf <!-- CSRF Token for security -->

            <!-- User Name Input -->
            <div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="User Name" required autofocus class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400 @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Input -->
            <div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400 @error('email') border-red-500 @enderror" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400 @error('password') border-red-500 @enderror" />
                 @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="block text-center w-full py-3 rounded-lg bg-lime-400 text-black font-semibold hover:bg-lime-300 transition">
                Daftar
            </button>
        </form>

        <p class="text-center text-sm text-gray-300">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-lime-400 hover:underline">Masuk di sini</a>
        </p>
      </div>
    </div>
</body>
</html>
