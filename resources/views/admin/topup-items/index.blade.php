@extends('layouts.admin')

@section('title', 'Pilih Game untuk Dikelola')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @forelse ($games as $game)
            <a href="{{ route('admin.topup-items.show', $game->id) }}" class="group block bg-gray-800/50 rounded-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-lg hover:shadow-lime-500/10">
                <img src="{{ asset('assets/logogame/' . $game->logo) }}" alt="Logo {{ $game->name }}" class="w-full h-40 object-cover">
                <div class="p-3">
                    <h3 class="font-semibold text-white truncate group-hover:text-[#D7FD52] transition-colors">{{ $game->name }}</h3>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-400">Belum ada data game. Silakan tambahkan game terlebih dahulu.</p>
            </div>
        @endforelse
    </div>
@endsection
