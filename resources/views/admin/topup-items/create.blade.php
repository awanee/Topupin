@extends('layouts.admin')

@section('title', 'Tambah Item Baru untuk ' . $game->name)

@section('content')
    <div class="max-w-2xl mx-auto">
        {{-- Tombol Kembali --}}
        <div class="mb-6">
            <a href="{{ route('admin.topup-items.show', $game->id) }}" class="text-sm text-gray-400 hover:text-white">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Item {{ $game->name }}
            </a>
        </div>

        {{-- PERBAIKAN: Menyertakan parameter '$game->id' pada route 'store' --}}
        <form action="{{ route('admin.topup-items.store', $game->id) }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nama Game (Hanya untuk ditampilkan, tidak bisa diubah) --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Game</label>
                <input type="text" value="{{ $game->name }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2 text-gray-400" readonly>
            </div>

            {{-- Nama Item --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Item</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required>
                <p class="text-xs text-gray-500 mt-1">Contoh: 100 Diamonds, 250 VP, Weekly Pass</p>
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-1">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required>
                @error('price')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-4">
                <button type="submit" class="w-full bg-[#D7FD52] text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
                    Simpan Item
                </button>
            </div>
        </form>
    </div>
@endsection
