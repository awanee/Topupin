@extends('layouts.admin')

@section('title', 'Tambah Game Baru')

@section('content')
    <div class="max-w-2xl mx-auto">
        {{-- Tombol Kembali --}}
        <div class="mb-6">
            <a href="{{ route('admin.games.index') }}" class="text-sm text-gray-400 hover:text-white">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Manajemen Game
            </a>
        </div>

        <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Nama Game --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Game</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required>
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

             {{-- Pilihan Kategori --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-300 mb-1">Kategori Game</label>
                <select name="category_id" id="category_id" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Upload Thumbnail --}}
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-300 mb-1">Thumbnail (Gambar Kecil)</label>
                <input type="file" name="thumbnail" id="thumbnail" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-400/10 file:text-lime-300 hover:file:bg-lime-400/20" required>
                <p class="text-xs text-gray-500 mt-1">Rekomendasi rasio 1:1 (persegi). Maksimal 2MB.</p>
                @error('thumbnail')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Upload Logo --}}
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-300 mb-1">Logo (Gambar Besar)</label>
                <input type="file" name="logo" id="logo" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-400/10 file:text-lime-300 hover:file:bg-lime-400/20" required>
                <p class="text-xs text-gray-500 mt-1">Rekomendasi rasio 16:9 (persegi panjang). Maksimal 2MB.</p>
                @error('logo')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Butuh Server ID --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Butuh Server ID?</label>
                <select name="needs_server_id" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-lime-400">
                    <option value="1" {{ old('needs_server_id') == '1' ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('needs_server_id') == '0' ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('needs_server_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-4">
                <button type="submit" class="w-full bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
                    Simpan Game
                </button>
            </div>
        </form>
    </div>
@endsection
