<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topupin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/oTopupin.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('js/Main.js') }}"></script>
    <style>
        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-black text-white font-sans">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Mobile Dropdown Menu -->
    <div id="dropdownMenu" class="fixed top-12 left-0 w-full bg-[#242424] text-white z-40 hidden animate-slide-down">
        <div class="flex flex-col px-6 py-4 space-y-4 border-t border-gray-700">
            <div class="relative">
                <input type="text" class="text-gray-400 rounded px-3 py-2 w-full" placeholder="Search..." />
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2">
                    <i class="fas fa-search text-gray-400"></i>
                </button>
            </div>
            <a href="{{ url('History') }}" class="hover:text-[#D7FD52] text-lg flex items-center gap-2">
                <i class="fas fa-box"></i> Lacak Pesanan
            </a>
            <a href="#" class="hover:text-[#D7FD52] text-lg flex items-center gap-2">
                <i class="fas fa-user"></i> Akun Saya
            </a>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const menu = document.getElementById("dropdownMenu");
            menu.classList.toggle("hidden");
        }
    </script>

    <!-- Main Content -->
    <main class="p-4 pt-20">
        <div class="py-8 px-4 kategori-content" data-kategori="semua">
            <div class="flex py-8 justify-between items-center">
                <h2 class="text-2xl font-bold">Game Populer</h2>
            </div>

            <div
                class="md:px-16 lg:px-16 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-6 gap-3 sm:gap-4">
                @foreach (array_slice($games, 0, 18) as $game)
                    <div class="w-full flex flex-col border border-gray-700 rounded overflow-hidden bg-[#242424]">
                        <img src="{{ asset('assets/imgPopuler/' . $game['image']) }}"
                            class="object-cover w-full h-40" alt="game">
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <h1 class="text-base font-semibold break-words h-[60px] overflow-hidden mb-2">
                                {{ $game['title'] }}</h1>
                            <div class="flex justify-between items-center">
                                <p class="text-sm">Rp.{{ number_format($game['price'], 0, ',', '.') }}</p>
                                <button class="px-4 py-1 text-sm bg-lime-400 rounded text-black">Beli</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>
