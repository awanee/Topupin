@extends('layouts.app') {{-- Assuming your main layout file is resources/views/layouts/app.blade.php --}}

@section('title', 'Minecraft Shop') {{-- Sets the title for this specific page --}}

@section('content')
    <main class="container mx-auto my-6 px-4 mt-20">
        <div class="mb-6">
            <a href="{{ url('Account.html') }}" class="text-white hover:text-[#D7FD52] flex items-center gap-2 w-fit top-4">
                <i class="fas fa-arrow-left"></i> <span class="font-bold">Kembali</span>
            </a>
        </div>
        <div class="bg-black text-white p-4 rounded flex flex-col sm:flex-row items-center mb-6">
            <div class="mr-0 sm:mr-4 mb-4 sm:mb-0">
                <img src="{{ asset('assets/logogame/logococ.png') }}" alt="Clash Of Clans Logo" class="w-16 h-16 rounded">
            </div>
            <div class="text-center sm:text-left">
                <h1 class="text-lg font-bold">Clash Of Clans</h1>
                <p class="text-sm text-gray-400">Beli Akun Clash Of Clans serta Gems pakai tools promo, harian hingga 395, Top Up COC termurah & proses instant di Topupin.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
                $products = [
                    ['th' => '9', 'type' => 'SIAP MAX MURAH', 'price' => '150.000', 'page' => 1, 'img' => 'basecoc.webp'],
                    ['th' => '10', 'type' => 'SIAP MAX MURAH', 'price' => '200.000', 'page' => 1, 'img' => 'basecoc.webp'],
                    ['th' => '11', 'type' => 'SIAP MAX MURAH', 'price' => '250.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '12', 'type' => 'SIAP MAX MURAH', 'price' => '300.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '13', 'type' => 'SIAP MAX MURAH', 'price' => '350.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '9', 'type' => 'SEMI MAX MURAH', 'price' => '100.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '10', 'type' => 'SEMI MAX MURAH', 'price' => '150.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '11', 'type' => 'SEMI MAX MURAH', 'price' => '200.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '12', 'type' => 'SEMI MAX MURAH', 'price' => '250.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '13', 'type' => 'SEMI MAX MURAH', 'price' => '300.000', 'page' => 1, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SEMI MAX TOWN HALL 14', 'price' => '380.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '15', 'type' => 'SIAP MAX TOWN HALL 15', 'price' => '550.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '15', 'type' => 'SEMI MAX TOWN HALL 15', 'price' => '480.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 2, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '550.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SEMI MAX TOWN HALL 14', 'price' => '480.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '750.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SEMI MAX TOWN HALL 14', 'price' => '380.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SEMI MAX TOWN HALL 14', 'price' => '380.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SEMI MAX TOWN HALL 14', 'price' => '380.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SIAP MAX TOWN HALL 14', 'price' => '450.000', 'page' => 3, 'img' => 'basecoc.png'],
                    ['th' => '14', 'type' => 'SEMI MAX TOWN HALL 14', 'price' => '380.000', 'page' => 3, 'img' => 'basecoc.png'],
                ];
            @endphp

            @foreach ($products as $index => $product)
                <div class="bg-gray-800 text-white rounded overflow-hidden product-item" data-page="{{ $product['page'] }}" style="{{ $product['page'] == 1 ? '' : 'display: none;' }}">
                    <div class="relative">
                        <img src="{{ asset('assets/other/' . $product['img']) }}" alt="Town Hall {{ $product['th'] }}" class="w-full" width="300" height="200" loading="lazy">
                        <span class="absolute top-2 left-2 bg-gray-800 text-white px-2 py-1 text-xs rounded">TOWN HALL {{ $product['th'] }} / TH {{ $product['th'] }}</span>
                        <span class="absolute top-2 right-2">
                            <i class="fas fa-star text-yellow-400"></i>
                        </span>
                    </div>
                    <div class="p-3">
                        <p class="font-bold mb-1 text-sm sm:text-base">{{ $product['type'] }}</p>
                        <p class="text-[#D7FD52] text-xs sm:text-sm mb-2">Rp{{ $product['price'] }}/ Akun</p>
                        <button class="bg-[#D7FD52] text-black px-3 sm:px-4 py-1 rounded text-xs sm:text-sm float-right mt-2 sm:mt-4 mb-2 sm:mb-3"><a href="{{ url('Buy.html') }}">Beli</a></button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-8">
            <nav class="inline-flex rounded-md shadow pagination-nav">
                <a href="#" class="prev-btn px-3 py-2 rounded-l-md bg-[#242424] text-white hover:bg-lime-400 hover:text-black">
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-3 py-2 bg-lime-400 text-black page-link" data-page="1">1</a>
                <a href="#" class="px-3 py-2 bg-[#242424] text-white hover:bg-lime-400 hover:text-black page-link" data-page="2">2</a>
                <a href="#" class="px-3 py-2 bg-[#242424] text-white hover:bg-lime-400 hover:text-black page-link" data-page="3">3</a>
                <a href="#" class="next-btn px-3 py-2 rounded-r-md bg-[#242424] text-white hover:bg-lime-400 hover:text-black">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pageLinks = document.querySelectorAll('.pagination-nav .page-link');
            const prevBtn = document.querySelector('.pagination-nav .prev-btn');
            const nextBtn = document.querySelector('.pagination-nav .next-btn');
            const productItems = document.querySelectorAll('.product-item');
            let currentPage = 1;
            const productsPerPage = 10; // Number of products to show per page

            function showPage(page) {
                productItems.forEach((item, index) => {
                    const itemPage = Math.ceil((index + 1) / productsPerPage); // Calculate page based on index and productsPerPage
                    if (itemPage === page) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                pageLinks.forEach(link => {
                    if (parseInt(link.dataset.page) === page) {
                        link.classList.add('bg-lime-400', 'text-black');
                        link.classList.remove('bg-[#242424]', 'text-white');
                    } else {
                        link.classList.add('bg-[#242424]', 'text-white');
                        link.classList.remove('bg-lime-400', 'text-black');
                    }
                });
                currentPage = page;
            }

            pageLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const page = parseInt(this.dataset.page);
                    showPage(page);
                });
            });

            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    showPage(currentPage - 1);
                }
            });

            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const totalPages = Math.ceil(productItems.length / productsPerPage);
                if (currentPage < totalPages) {
                    showPage(currentPage + 1);
                }
            });

            // Initial load: show the first page
            showPage(currentPage);
        });
    </script>
@endpush
