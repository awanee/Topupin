@extends('layouts.admin')

@section('title', 'Edit Item: ' . $topupItem->name)

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.topup-items.show', $topupItem->game_id) }}" class="text-sm text-gray-400 hover:text-white">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Item {{ $topupItem->game->name }}
            </a>
        </div>

        {{-- PERBAIKAN: Menambahkan enctype="multipart/form-data" untuk upload file --}}
        <form action="{{ route('admin.topup-items.update', $topupItem->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Game</label>
                <input type="text" value="{{ $topupItem->game->name }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2 text-gray-400" readonly>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Item</label>
                <input type="text" name="name" id="name" value="{{ old('name', $topupItem->name) }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white" required>
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-1">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $topupItem->price) }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white" required>
                @error('price')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-300 mb-1">Ganti Gambar Item (Opsional)</label>
                @if($topupItem->image)
                <div class="my-2">
                    <img src="{{ asset('assets/diamondgame/' . $topupItem->image) }}" alt="Current Image" class="w-24 h-auto rounded-md">
                </div>
                @endif
                <input type="file" name="image" id="image" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-400/10 file:text-lime-300 hover:file:bg-lime-400/20">
                @error('image')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300">
                    Perbarui Item
                </button>
            </div>
        </form>
    </div>
@endsection
