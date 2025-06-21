@extends('layouts.app') {{-- Extends the main layout file --}}

@section('title', 'Game Account Marketplace') {{-- Sets the specific title for this page --}}

@section('content')
    <main id="main-content" class="container mx-auto px-4 py-auto mt-4">
        <div class="mb-6 pt-20">
            <a href="{{ url('AccountCoc.html') }}" class="text-white hover:text-[#D7FD52] flex items-center gap-2 w-fit top-4" aria-label="Kembali ke halaman akun Clash of Clans">
                <i class="fas fa-arrow-left" aria-hidden="true"></i> <span class="font-bold">Kembali</span>
            </a>
        </div>

        ---

        <section class="mb-12">
            <h1 class="sr-only">Akun Clash of Clans Unggulan</h1>
            <div class="bg-black p-4 rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <img src="{{ asset('assets/other/basecoc.png') }}" alt="Base Clash of Clans Town Hall 9 dengan pertahanan maksimal" class="w-full h-auto rounded-lg" />
                    </div>

                    <div class="col-span-2">
                        <h2 class="text-2xl font-bold mb-2">COC TH9</h2>
                        <p class="text-gray-300 text-sm mb-3">
                            Rak pertahanan defense logarthm sudah max level full defense bersih lengkap jangan lilit. Hap lengkap juga max level all season.
                        </p>

                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-gray-400 text-sm line-through">Rp.11.100.000</p>
                                <p class="text-[#E0FF7F] text-2xl font-bold">Rp 11.999.000</p>
                            </div>
                            <span class="bg-[#D7FD52] text-black px-2 py-1 text-xs font-bold rounded">Promo!</span>
                        </div>

                        <div class="space-y-2">
                            <button class="bg-[#D7FD52] text-black px-4 py-2 rounded w-full font-bold" aria-label="Beli akun COC TH9 sekarang">
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        ---

        <section class="mb-12">
            <h2 class="text-xl font-bold mb-4">Akun Lainnya Yang Mungkin Anda Suka</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @php
                    $suggestedAccounts = [
                        ['th' => '7', 'type' => 'GEM MAX MURAH', 'price' => '150.000', 'img' => 'basecoc.png'],
                        ['th' => '7', 'type' => 'GEM MAX MURAH', 'price' => '150.000', 'img' => 'basecoc.png'],
                        ['th' => '7', 'type' => 'GEM MAX MURAH', 'price' => '150.000', 'img' => 'basecoc.png'],
                        ['th' => '8', 'type' => 'BUILDER BASE MAX', 'price' => '180.000', 'img' => 'basecoc.png'],
                        ['th' => '9', 'type' => 'CLAN GAMES READY', 'price' => '220.000', 'img' => 'basecoc.png'],
                        ['th' => '10', 'type' => 'HEROES HIGH LEVEL', 'price' => '280.000', 'img' => 'basecoc.png'],
                        ['th' => '11', 'type' => 'TROPHY PUSHER', 'price' => '350.000', 'img' => 'basecoc.png'],
                        ['th' => '12', 'type' => 'WAR BASE OPTIMIZED', 'price' => '420.000', 'img' => 'basecoc.png'],
                    ];
                @endphp

                @foreach ($suggestedAccounts as $account)
                    <div class="bg-[#242424] rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/other/' . $account['img']) }}" alt="Base Clash of Clans Town Hall {{ $account['th'] }}" class="w-full h-auto" />
                        <div class="p-3">
                            <h3 class="text-white text-sm font-bold">TOWN HALL {{ $account['th'] }} | TH {{ $account['th'] }}</h3>
                            <p class="text-gray-300 text-xs">{{ $account['type'] }}</p>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-[#E0FF7F] text-xs">Rp{{ $account['price'] }}/ Akun</span>
                                <button class="bg-[#D7FD52] text-black text-xs px-2 py-1 rounded" aria-label="Beli akun TOWN HALL {{ $account['th'] }}">Beli</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // Any specific JavaScript for the Buy page can go here if needed.
        // The mobile menu toggle script is already in the main layout.
    </script>
@endpush
