@extends('layouts.admin')

@section('title', 'Edit Game: ' . $game->name)

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.games.index') }}" class="text-sm text-gray-400 hover:text-white">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Manajemen Game
            </a>
        </div>

        <form action="{{ route('admin.games.update', $game->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama Game --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Game</label>
                <input type="text" name="name" id="name" value="{{ old('name', $game->name) }}" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white" required>
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-300 mb-1">Slug (URL)</label>
                <input type="text" name="slug" id="slug" value="{{ $game->slug }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2 text-gray-400 cursor-not-allowed" readonly>
                <p class="text-xs text-gray-500 mt-1">Slug tidak dapat diubah setelah dibuat.</p>
            </div>

             {{-- Pilihan Kategori --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-300 mb-1">Kategori Game</label>
                <select name="category_id" id="category_id" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white">
                    @foreach($categories as $category)
                        {{-- Memeriksa apakah kategori ini adalah kategori yang sudah dimiliki game --}}
                        <option value="{{ $category->id }}" {{ $game->categories->contains($category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Upload Thumbnail --}}
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-300 mb-1">Ganti Thumbnail (Opsional)</label>
                <div class="flex items-center gap-4 mt-2">
                    <img src="{{ asset('assets/logogame/' . $game->thumbnail) }}" alt="Current Thumbnail" class="w-16 h-16 rounded-md object-cover">
                    <input type="file" name="thumbnail" id="thumbnail" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-400/10 file:text-lime-300 hover:file:bg-lime-400/20">
                </div>
                @error('thumbnail')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Upload Logo --}}
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-300 mb-1">Ganti Logo (Opsional)</label>
                 <div class="flex items-center gap-4 mt-2">
                    <img src="{{ asset('assets/logogame/' . $game->logo) }}" alt="Current Logo" class="w-24 h-auto rounded-md object-cover">
                    <input type="file" name="logo" id="logo" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-400/10 file:text-lime-300 hover:file:bg-lime-400/20">
                </div>
                @error('logo')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Butuh Server ID --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Butuh Server ID?</label>
                <select name="needs_server_id" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-3 py-2 text-white">
                    <option value="1" {{ old('needs_server_id', $game->needs_server_id) == 1 ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('needs_server_id', $game->needs_server_id) == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('needs_server_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-4">
                <button type="submit" class="w-full bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
                    Perbarui Game
                </button>
            </div>
        </form>
    </div>
@endsection
