@extends('layouts.admin')

@section('title', 'Edit Item: ' . $topupItem->name)

@section('content')
    <div class="max-w-2xl mx-auto">
        {{-- Tombol Kembali --}}
        <div class="mb-6">
            {{-- Tombol ini akan mengarahkan kembali ke halaman detail item untuk game yang bersangkutan --}}
            <a href="{{ route('admin.topup-items.show', $topupItem->game_id) }}" class="text-sm text-gray-400 hover:text-white">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Item {{ $topupItem->game->name }}
            </a>
        </div>

        {{-- PERBAIKAN: Form action sekarang menunjuk ke route 'update', bukan 'store' --}}
        <form action="{{ route('admin.topup-items.update', $topupItem->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') {{-- Menggunakan metode PUT untuk proses update --}}

            {{-- Nama Game (Hanya untuk ditampilkan, tidak bisa diubah) --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Game</label>
                <input type="text" value="{{ $topupItem->game->name }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2 text-gray-400" readonly>
            </div>

            {{-- Nama Item --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Item</label>
                <input type="text" name="name" id="name" value="{{ old('name', $topupItem->name) }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required>
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-1">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $topupItem->price) }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required>
                @error('price')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-4">
                <button type="submit" class="w-full bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
                    Perbarui Item
                </button>
            </div>
        </form>
    </div>
@endsection
