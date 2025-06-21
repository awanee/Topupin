@extends('layouts.app')

@section('title', 'Home - Top Up Game Murah dan Cepat')

@section('content')

<!-- Carousel -->
<div class="relative overflow-hidden bg-black w-full aspect-[17/5] max-w-screen-xl mx-auto rounded-2xl" id="carousel">
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ asset('assets/promo/promosi1.png') }}" alt="Banner 1"
            class="carousel-image absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100 rounded-2xl" />
        <img src="{{ asset('assets/promo/promosi2.png') }}" alt="Banner 2"
            class="carousel-image absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0 rounded-2xl" />
    </div>
    <button id="prev" class="absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-white/20 hover:bg-white/40 text-white rounded-full p-2">&#10094;</button>
    <button id="next" class="absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-white/20 hover:bg-white/40 text-white rounded-full p-2">&#10095;</button>
    <div class="absolute bottom-2 w-full flex justify-center space-x-2 z-10">
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white" data-index="0"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-500" data-index="1"></button>
    </div>
</div>

<!-- Kategori -->
<div class="container mx-auto px-4 py-6">
    <div class="px-4 sm:px-6 mt-1">
        <div class="flex justify-start gap-1 sm:gap-2">
            <a href="#" data-category="semua" class="kategori-btn flex-1 sm:flex-none sm:w-28 bg-lime-400 text-black px-1 sm:px-4 py-2 rounded-md text-xs sm:text-sm text-center font-medium truncate">SEMUA</a>
            <a href="#" data-category="topup" class="kategori-btn flex-1 sm:flex-none sm:w-28 bg-zinc-800 text-white px-1 sm:px-4 py-2 rounded-md text-xs sm:text-sm text-center font-medium truncate transition duration-150 ease-in-out hover:bg-lime-400 hover:text-black">TOP UP</a>
            <a href="#" data-category="akun" class="kategori-btn flex-1 sm:flex-none sm:w-28 bg-zinc-800 text-white px-1 sm:px-4 py-2 rounded-md text-xs sm:text-sm text-center font-medium truncate transition duration-150 ease-in-out hover:bg-lime-400 hover:text-black">AKUN</a>
            <a href="#" data-category="joki" class="kategori-btn flex-1 sm:flex-none sm:w-28 bg-zinc-800 text-white px-1 sm:px-4 py-2 rounded-md text-xs sm:text-sm text-center font-medium truncate transition duration-150 ease-in-out hover:bg-lime-400 hover:text-black">TIM</a>
        </div>
    </div>
</div>

<!-- Container untuk semua konten yang bisa difilter -->
<div id="filtered-content">


    <!-- Flash Sale (Kategori: topup) -->
    <div class="kategori-content px-4 sm:px-6 mt-6" data-kategori="topup" style="display: none;">
        <div class="flex items-center gap-2 mb-4">
            <h2 class="text-xl font-bold">FLASHSALE</h2>
            <span class="bg-lime-400 text-black px-2 py-1 rounded font-mono text-sm" id="countdown">0:00:00:00</span>
        </div>

        <!-- Desktop/Tablet Grid -->
        <div class="hidden sm:grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-4">
            <div class="w-full rounded overflow-hidden">
                <img src="{{ asset('assets/diskon/diskon1.png') }}" alt="produk" class="w-full h-auto object-cover rounded">
            </div>
            <div class="w-full rounded overflow-hidden">
                <img src="{{ asset('assets/diskon/diskon2.png') }}" alt="produk" class="w-full h-auto object-cover rounded">
            </div>
            <div class="w-full rounded overflow-hidden">
                <img src="{{ asset('assets/diskon/diskon3.png') }}" alt="produk" class="w-full h-auto object-cover rounded">
            </div>
        </div>

        <!-- Mobile Slider -->
        <div class="sm:hidden relative">
            <div class="flash-slider-container flex overflow-hidden">
                <div class="flash-slide min-w-full px-4 flex justify-center flex-shrink-0">
                    <img src="{{ asset('assets/diskon/diskon1.png') }}" alt="produk" class="w-[75%] h-auto object-cover rounded">
                </div>
                <div class="flash-slide min-w-full px-4 flex justify-center flex-shrink-0">
                    <img src="{{ asset('assets/diskon/diskon2.png') }}" alt="produk" class="w-[75%] h-auto object-cover rounded">
                </div>
                <div class="flash-slide min-w-full px-4 flex justify-center flex-shrink-0">
                    <img src="{{ asset('assets/diskon/diskon3.png') }}" alt="produk" class="w-[75%] h-auto object-cover rounded">
                </div>
            </div>
            <div class="flash-dots-container flex justify-center mt-4">
                <button class="flash-dot w-3 h-3 rounded-full bg-gray-700 mx-1"></button>
                <button class="flash-dot w-3 h-3 rounded-full bg-gray-300 mx-1"></button>
                <button class="flash-dot w-3 h-3 rounded-full bg-gray-300 mx-1"></button>
            </div>
        </div>
    </div>

    <!-- Game Populer (Kategori: semua) -->
    <div class="kategori-content py-8 px-6" data-kategori="semua">
        <div class="flex justify-between items-center py-8">
            <h2 class="text-xl font-bold">GAME POPULER</h2>
            <a href="#" class="text-lime-400 font-bold">Lihat semua</a>
        </div>
        <div class="md:px-16 lg:px-16 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3 sm:gap-4">
            <!-- Card 1 -->
            <div class="w-full flex flex-col"><img src="{{ asset('assets/imgPopuler/imgpopuler2.png') }}" class="rounded object-cover w-full" alt="game"><div class="bg-[#242424] rounded-b-lg px-4 py-2 flex-1 flex flex-col justify-between"><h1 class="text-sm font-semibold break-words h-[60px] overflow-hidden">Minecraft Java & Bedrock Edition - Microsoft</h1><div class="py-2"><p class="text-sm">Rp.285.500</p><button class="mt-2 w-full py-1 bg-lime-400 rounded-lg text-black font-semibold">Beli</button></div></div></div>
            <!-- Card 2 -->
            <div class="w-full flex flex-col"><img src="{{ asset('assets/imgPopuler/imgpopuler1.png') }}" class="rounded object-cover w-full" alt="game"><div class="bg-[#242424] rounded-b-lg px-4 py-2 flex-1 flex flex-col justify-between"><h1 class="text-sm font-semibold break-words h-[60px] overflow-hidden">Minecraft Java & Bedrock Edition - Microsoft</h1><div class="py-2"><p class="text-sm">Rp.285.500</p><button class="mt-2 w-full py-1 bg-lime-400 rounded-lg text-black font-semibold">Beli</button></div></div></div>
            <!-- Card 3 -->
            <div class="w-full flex flex-col"><img src="{{ asset('assets/imgPopuler/imgpopuler3.png') }}" class="rounded object-cover w-full" alt="game"><div class="bg-[#242424] rounded-b-lg px-4 py-2 flex-1 flex flex-col justify-between"><h1 class="text-sm font-semibold break-words h-[60px] overflow-hidden">Resident Evil Village</h1><div class="py-2"><p class="text-sm">Rp.285.500</p><button class="mt-2 w-full py-1 bg-lime-400 rounded-lg text-black font-semibold">Beli</button></div></div></div>
            <!-- Card 4 -->
            <div class="w-full flex flex-col"><img src="{{ asset('assets/imgPopuler/imgpopuler6.png') }}" class="rounded object-cover w-full" alt="game"><div class="bg-[#242424] rounded-b-lg px-4 py-2 flex-1 flex flex-col justify-between"><h1 class="text-sm font-semibold break-words h-[60px] overflow-hidden">GHOST of tsushima</h1><div class="py-2"><p class="text-sm">Rp.285.500</p><button class="mt-2 w-full py-1 bg-lime-400 rounded-lg text-black font-semibold">Beli</button></div></div></div>
            <!-- Card 5 -->
            <div class="w-full flex flex-col"><img src="{{ asset('assets/imgPopuler/imgpopuler5.png') }}" class="rounded object-cover w-full" alt="game"><div class="bg-[#242424] rounded-b-lg px-4 py-2 flex-1 flex flex-col justify-between"><h1 class="text-sm font-semibold break-words h-[60px] overflow-hidden">GHOST of tsushima</h1><div class="py-2"><p class="text-sm">Rp.285.500</p><button class="mt-2 w-full py-1 bg-lime-400 rounded-lg text-black font-semibold">Beli</button></div></div></div>
            <!-- Card 6 -->
            <div class="w-full flex flex-col"><img src="{{ asset('assets/imgPopuler/imgpopuler6.png') }}" class="rounded object-cover w-full" alt="game"><div class="bg-[#242424] rounded-b-lg px-4 py-2 flex-1 flex flex-col justify-between"><h1 class="text-sm font-semibold break-words h-[60px] overflow-hidden">Minecraft Java & Bedrock Edition - Microsoft</h1><div class="py-2"><p class="text-sm">Rp.285.500</p><button class="mt-2 w-full py-1 bg-lime-400 rounded-lg text-black font-semibold">Beli</button></div></div></div>
        </div>
    </div>

    <!-- Kategori Game (Kategori: semua) -->
    <div class="kategori-content" data-kategori="semua">
        <!-- Layout Desktop & Tablet -->
        <div class="hidden md:grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 px-6">
            <!-- TOP UP GAME -->
            <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-white font-semibold text-xl mb-6">TOP UP GAME</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logobalap.png') }}" alt="Balap" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash of Clans" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logodf.png') }}" alt="Dragon Force" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logoepep.png') }}" alt="epep" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logofornite.png') }}" alt="fortnite" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logomobile.png') }}" alt="ML" class="w-full h-full object-cover"></div>
                </div>
                <a href="#" class="block mt-6 text-center bg-lime-400 text-black py-3 rounded-lg font-semibold hover:bg-lime-500">Lihat semua</a>
            </div>
            <!-- AKUN -->
            <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-white font-semibold text-xl mb-6">AKUN</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logobalap.png') }}" alt="Balap" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash of Clans" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logodf.png') }}" alt="Dragon Force" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logoepep.png') }}" alt="epep" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logofornite.png') }}" alt="fortnite" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logomobile.png') }}" alt="ML" class="w-full h-full object-cover"></div>
                </div>
                <a href="#" class="block mt-6 text-center bg-lime-400 text-black py-3 rounded-lg font-semibold hover:bg-lime-500">Lihat semua</a>
            </div>
            <!-- JASA JOKI -->
            <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-white font-semibold text-xl mb-6">JASA JOKI</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logobalap.png') }}" alt="Balap" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash of Clans" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logodf.png') }}" alt="Dragon Force" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logoepep.png') }}" alt="epep" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logofornite.png') }}" alt="fortnite" class="w-full h-full object-cover"></div>
                    <div class="aspect-square bg-gray-800 rounded-lg overflow-hidden hover:scale-105"><img src="{{ asset('assets/logogame/logomobile.png') }}" alt="ML" class="w-full h-full object-cover"></div>
                </div>
                <a href="#" class="block mt-6 text-center bg-lime-400 text-black py-3 rounded-lg font-semibold hover:bg-lime-500">Lihat semua</a>
            </div>
        </div>

        <!-- Layout Mobile -->
        <div class="md:hidden space-y-6 mt-8 px-4">
            <!-- TOP UP GAME - Mobile -->
            <div class="bg-gray-900 rounded-xl shadow-lg"><div class="p-4 flex items-center justify-between"><h3 class="text-white font-semibold text-lg">TOP UP GAME</h3><a href="#" class="text-lime-400 text-sm font-medium">Lihat semua</a></div><div class="px-4 pb-4"><div class="flex gap-3 overflow-x-auto scrollbar-hidden pb-2"><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logobalap.png') }}" alt="Balap" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash of Clans" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logodf.png') }}" alt="Dragon Force" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logoepep.png') }}" alt="epep" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logofornite.png') }}" alt="Fortnite" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logomobile.png') }}" alt="ML" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logopb.png') }}" alt="pb" class="w-full h-full object-cover"></div></div></div></div>
            <!-- AKUN - Mobile -->
            <div class="bg-gray-900 rounded-xl shadow-lg"><div class="p-4 flex items-center justify-between"><h3 class="text-white font-semibold text-lg">AKUN</h3><a href="#" class="text-lime-400 text-sm font-medium">Lihat semua</a></div><div class="px-4 pb-4"><div class="flex gap-3 overflow-x-auto scrollbar-hidden pb-2"><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logobalap.png') }}" alt="Balap" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash of Clans" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logodf.png') }}" alt="Dragon Force" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logoepep.png') }}" alt="epep" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logofornite.png') }}" alt="Fortnite" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logomobile.png') }}" alt="ML" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logopb.png') }}" alt="pb" class="w-full h-full object-cover"></div></div></div></div>
            <!-- JASA JOKI - Mobile -->
            <div class="bg-gray-900 rounded-xl shadow-lg"><div class="p-4 flex items-center justify-between"><h3 class="text-white font-semibold text-lg">JASA JOKI</h3><a href="#" class="text-lime-400 text-sm font-medium">Lihat semua</a></div><div class="px-4 pb-4"><div class="flex gap-3 overflow-x-auto scrollbar-hidden pb-2"><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logobalap.png') }}" alt="Balap" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash of Clans" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logodf.png') }}" alt="Dragon Force" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logoepep.png') }}" alt="epep" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logofornite.png') }}" alt="Fortnite" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logomobile.png') }}" alt="ML" class="w-full h-full object-cover"></div><div class="flex-shrink-0 w-16 h-16 bg-gray-800 rounded-lg overflow-hidden"><img src="{{ asset('assets/logogame/logopb.png') }}" alt="pb" class="w-full h-full object-cover"></div></div></div></div>
        </div>
    </div>
</div>

<!-- Pop Up Iklan -->
<div id="popup" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
    <div class="relative max-w-md mx-4">
        <img src="{{ asset('assets/promo/promo.png') }}" class="rounded" alt="Iklan">
        <button onclick="document.getElementById('popup').style.display='none'"
            class="absolute top-1 right-1 bg-white text-black rounded-full px-2">✕</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carousel Logic
    const images = document.querySelectorAll('.carousel-image');
    const indicators = document.querySelectorAll('.carousel-indicator');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    let currentIndex = 0;
    let intervalId = setInterval(nextSlide, 5000);

    function showSlide(index) {
        images.forEach((img, i) => {
            img.style.opacity = i === index ? '1' : '0';
        });
        indicators.forEach((btn, i) => {
            btn.classList.toggle('bg-white', i === index);
            btn.classList.toggle('bg-gray-500', i !== index);
        });
        currentIndex = index;
    }

    function nextSlide() {
        showSlide((currentIndex + 1) % images.length);
    }

    function resetInterval() {
        clearInterval(intervalId);
        intervalId = setInterval(nextSlide, 5000);
    }

    if(nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetInterval();
        });
    }

    if(prevBtn) {
        prevBtn.addEventListener('click', () => {
            showSlide((currentIndex - 1 + images.length) % images.length);
            resetInterval();
        });
    }

    indicators.forEach(btn => {
        btn.addEventListener('click', () => {
            showSlide(parseInt(btn.dataset.index));
            resetInterval();
        });
    });

    // Category Filter Logic
    const categoryButtons = document.querySelectorAll('.kategori-btn');
    const contentSections = document.querySelectorAll('.kategori-content');

    categoryButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const category = button.dataset.category;

            categoryButtons.forEach(btn => {
                btn.classList.remove('bg-lime-400', 'text-black');
                btn.classList.add('bg-zinc-800', 'text-white');
            });

            button.classList.add('bg-lime-400', 'text-black');
            button.classList.remove('bg-zinc-800', 'text-white');

            contentSections.forEach(section => {
                if (category === 'semua') {
                    section.style.display = 'block';
                } else {
                    section.style.display = section.dataset.kategori === category ? 'block' : 'none';
                }
            });
        });
    });

    // Set 'semua' as default active on load
    document.querySelector('.kategori-btn[data-category="semua"]').click();

    // Hide popup after 5 seconds
    setTimeout(() => {
        const popup = document.getElementById('popup');
        if (popup) {
            popup.style.display = 'none';
        }
    }, 5000);
});
</script>
@endsection
