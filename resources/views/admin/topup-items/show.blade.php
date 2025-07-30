@extends('layouts.admin')

@section('title', 'Items untuk ' . $game->name)

@section('header-button')
    {{-- Tombol Tambah Item sekarang spesifik untuk game ini --}}
    <a href="{{ route('admin.topup-items.create', $game->id) }}" class="bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
        <i class="fas fa-plus mr-2"></i>Tambah Item untuk {{ $game->name }}
    </a>
@endsection

@section('content')
    {{-- Tombol Kembali --}}
    <div class="mb-6">
        <a href="{{ route('admin.topup-items.index') }}" class="text-sm text-gray-400 hover:text-white">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Pemilihan Game
        </a>
    </div>

    {{-- Tampilan daftar item (sama seperti sebelumnya, tapi sekarang untuk satu game) --}}
    @include('admin.topup-items.partials.item-list', ['items' => $topupItems])

@endsection

@section('fab')
    <a href="{{ route('admin.topup-items.create', $game->id) }}" class="fixed bottom-6 right-6 bg-lime-400 text-black w-14 h-14 rounded-full flex items-center justify-center shadow-lg">
        <i class="fas fa-plus text-2xl"></i>
    </a>
@endsection
