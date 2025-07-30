@extends('layouts.admin')

{{-- Mengisi judul halaman yang akan ditampilkan di layout --}}
@section('title', 'Manajemen Game')

{{-- Mengisi slot tombol di header untuk tampilan desktop --}}
@section('header-button')
    <a href="{{ route('admin.games.create') }}" class="bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
        <i class="fas fa-plus mr-2"></i>Tambah Game
    </a>
@endsection

{{-- Mengisi konten utama halaman --}}
@section('content')
    <div class="overflow-x-auto">
        <div class="space-y-4">

            {{-- PERBAIKAN: Menggunakan loop @forelse untuk menampilkan data game secara dinamis --}}
            @forelse ($games as $game)
                <div class="bg-gray-800/50 p-4 rounded-lg flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/logogame/' . $game->thumbnail) }}" class="w-12 h-12 rounded-md object-cover flex-shrink-0" alt="{{ $game->name }}">
                        <div>
                            <h3 class="font-bold text-white">{{ $game->name }}</h3>
                            <p class="text-sm text-gray-400">
                                {{ $game->needs_server_id ? 'Butuh Server ID' : 'Tidak Butuh Server ID' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3 text-sm flex-shrink-0">
                        <a href="{{ route('admin.games.edit', $game->id) }}" class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-md hover:bg-blue-500/40">Edit</a>

                        {{-- Form untuk tombol Hapus agar lebih aman --}}
                        <form action="{{ route('admin.games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus game ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500/20 text-red-300 px-3 py-1 rounded-md hover:bg-red-500/40">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                {{-- Tampilan jika tidak ada data game --}}
                <div class="text-center py-10">
                    <p class="text-gray-400">Belum ada data game yang ditambahkan.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection

{{-- Mengisi slot FAB (Floating Action Button) untuk tampilan mobile --}}
@section('fab')
    <a href="{{ route('admin.games.create') }}" class="fixed bottom-6 right-6 bg-lime-400 text-black w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-lime-300 transition-transform hover:scale-110 active:scale-100">
        <i class="fas fa-plus text-2xl"></i>
    </a>
@endsection
