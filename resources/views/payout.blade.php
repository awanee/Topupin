@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<!-- Main Content -->
<div class="bg-black text-white p-6 rounded-lg container mx-auto my-6 px-4">
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="text-white hover:text-[#D7FD52] flex items-center gap-2 w-fit">
            <i class="fas fa-arrow-left"></i> <span class="font-bold">Kembali</span>
        </a>
    </div>
    <!-- Product Header -->
    <div class="bg-black text-white p-4 rounded flex flex-col sm:flex-row items-center mb-5">
        <div class="mr-0 sm:mr-4 mb-4 sm:mb-0">
            <img src="{{ asset('assets/logogame/logovalo.png') }}" alt="Valorant Logo" class="w-20 h-20 rounded">
        </div>
        <div class="text-center sm:text-left">
            <h1 class="text-lg font-bold">Valorant</h1>
            <p class="text-sm text-gray-400">Beli Valorant Points lebih murah pakai kode promo, hemat hingga 39%. Top Up Valorant Points murah & proses instan di Topupin..</p>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="flex gap-2 mb-6">
        <button class="bg-[#D7FD52] rounded-[13px] py-2 px-8 hover:bg-zinc-700 active:bg-zinc-600 transition text-black">TOP UP</button>
        <button class="bg-[#242424] rounded-[13px] py-2 px-8 hover:bg-zinc-700 active:bg-zinc-600 transition">AKUN</button>
        <button class="bg-[#242424] rounded-[13px] py-2 px-8 hover:bg-zinc-700 active:bg-zinc-600 transition">ITEM</button>
        <button class="bg-[#242424] rounded-[13px] py-2 px-8 hover:bg-zinc-700 active:bg-zinc-600 transition">JASA JOKI</button>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Left Section - Nominal Selection -->
        <div class="md:col-span-2">
            <div class="bg-[#D7FD52] text-black p-3 rounded-t-[15px] font-bold flex items-center p-2">
                <div class="text-gray-800 text-lg font-bold">Pilih Nominal Top Up</div>
            </div>
            <div class="bg-[#242424] p-4 rounded-b-lg">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <!-- Topup Options -->
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="14500" data-amount="53 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">53 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp14.500</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="28500" data-amount="154 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">154 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp28.500</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="45000" data-amount="256 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">256 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp45.000</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="70000" data-amount="503 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">503 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp70.000</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="140000" data-amount="1010 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">1010 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp140.000</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="280000" data-amount="2020 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">2020 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp280.000</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="350000" data-amount="3330 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">3330 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp350.000</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="450000" data-amount="4440 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">4440 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp450.000</div>
                    </div>
                    <div class="nominal-card border border-gray-600 bg-[#242424] rounded-lg cursor-pointer hover:border-[#D7FD52]" data-price="725000" data-amount="8880 VP">
                        <div class="p-4 flex justify-center"><img src="{{ asset('assets/diamondgame/diamondcalo.png') }}" alt="Valorant Points" class="w-12 h-12"></div>
                        <div class="p-2 text-center text-sm">8880 VP<br><span class="text-xs text-gray-300">SD + Bonus</span></div>
                        <div class="bg-[#D7FD52] text-black text-center p-1 rounded-b-lg font-semibold">Rp725.000</div>
                    </div>
                </div>
            </div>

            <!-- Payment Method Section -->
            <div class="mt-6">
                <div class="bg-[#D7FD52] text-black p-3 rounded-t-[15px] font-bold">Pilih Metode Pembayaran</div>
                <div class="bg-[#242424] p-4 rounded-b-[15px]">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="payment-method bg-white rounded-lg p-2 flex items-center justify-center cursor-pointer border-2 border-transparent hover:border-[#D7FD52]" data-method="OVO"><img src="{{ asset('assets/logopembayaran/ovo.png') }}" alt="OVO" class="h-8"></div>
                        <div class="payment-method bg-white rounded-lg p-2 flex items-center justify-center cursor-pointer border-2 border-transparent hover:border-[#D7FD52]" data-method="QRIS"><img src="{{ asset('assets/logopembayaran/qris.png') }}" alt="QRIS" class="h-8"></div>
                        <div class="payment-method bg-white rounded-lg p-2 flex items-center justify-center cursor-pointer border-2 border-transparent hover:border-[#D7FD52]" data-method="DANA"><img src="{{ asset('assets/logopembayaran/dana.png') }}" alt="DANA" class="h-8"></div>
                        <div class="payment-method bg-white rounded-lg p-2 flex items-center justify-center cursor-pointer border-2 border-transparent hover:border-[#D7FD52]" data-method="Blu"><img src="{{ asset('assets/logopembayaran/blu.png') }}" alt="Blu" class="h-8"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section - Checkout -->
        <div class="bg-[#242424] rounded-[16px] shadow-lg text-white font-sans self-start">
            <div class="text-center bg-[#D7FD52] text-black font-bold py-3 text-lg rounded-t-[16px]">Checkout</div>
            <form id="checkoutForm" class="px-6 py-7 space-y-5 text-sm">
                <div>
                    <div class="flex flex-col gap-2">
                        <label class="font-semibold">No. WhatsApp <span class="text-[#D7FD52] font-normal">(opsional)</span></label>
                        <input type="tel" id="whatsapp" placeholder="Nomor ini akan dihubungi..." class="w-full bg-white text-black rounded-[8px] px-4 py-2 text-sm placeholder-gray-500 focus:outline-none">
                        <p class="text-xs text-gray-400 mt-1">Akan dihubungi apabila ada kendala.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">User ID <span class="text-red-500">*</span></label>
                    <input type="text" id="userId" placeholder="Masukkan User ID" class="w-full bg-white text-black rounded-[8px] px-4 py-2 text-sm focus:outline-none" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Server <span class="text-red-500">*</span></label>
                    <input type="text" id="server" placeholder="Masukkan Server" class="w-full bg-white text-black rounded-[8px] px-4 py-2 text-sm focus:outline-none" required>
                </div>
                <p class="font-semibold mt-4 mb-2">Ringkasan Pesanan</p>
                <div class="bg-[#242424] border border-[#D7FD52] rounded-[18px] p-4 space-y-2 text-sm">
                    <div class="flex justify-between"><span>Membeli Item</span><span id="amount-display">-</span></div>
                    <div class="flex justify-between"><span>Metode Pembayaran</span><span id="payment-method-display">-</span></div>
                    <div class="flex justify-between"><span>Harga Awal</span><span id="price-display">Rp0</span></div>
                    <div class="flex justify-between font-semibold text-[#D7FD52] pt-2 border-t border-gray-600"><span>Total</span><span id="total-price-display">Rp0</span></div>
                </div>
                <button type="submit" class="w-full bg-[#D7FD52] text-black font-bold py-3 rounded-[10px] text-sm mt-4 hover:bg-lime-300 transition-colors">Beli Sekarang</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Pastikan file Payout.js Anda memiliki fungsi-fungsi ini
    function closePaymentPopup() {
        const popup = document.getElementById('paymentPopup');
        if (popup) {
            popup.classList.add('hidden');
        }
    }

    function proceedPayment() {
        // Logika untuk melanjutkan pembayaran
        alert('Melanjutkan ke pembayaran...');
        closePaymentPopup();
    }
</script>
<script src="{{ asset('javascript/Payout.js') }}"></script>
@endsection
