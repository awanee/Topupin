@extends('layouts.admin')

{{-- Mengisi judul halaman yang akan ditampilkan di layout --}}
@section('title', 'Manage Topup Items')

{{-- Mengisi slot tombol di header untuk tampilan desktop --}}
@section('header-button')
    <a href="{{ route('admin.topup-items.create') }}" class="bg-lime-400 text-black font-semibold py-2 px-4 rounded-lg hover:bg-lime-300 transition-colors">
        <i class="fas fa-plus mr-2"></i>Tambah Item
    </a>
@endsection

{{-- Mengisi konten utama halaman --}}
@section('content')

    {{-- PERBAIKAN: Tampilan Tabel untuk Desktop --}}
    {{-- Div ini hanya akan terlihat di layar medium (md) ke atas --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-800/50 text-gray-300">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Game</th>
                    <th class="p-3">Nama Item</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topupItems as $item)
                    <tr class="border-b border-gray-800">
                        <td class="p-3">{{ $item->id }}</td>
                        <td class="p-3">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/logogame/' . $item->game->thumbnail) }}" alt="{{ $item->game->name }}" class="w-10 h-10 object-cover rounded-md">
                                <span>{{ $item->game->name }}</span>
                            </div>
                        </td>
                        <td class="p-3">{{ $item->name }}</td>
                        <td class="p-3">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="p-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.topup-items.edit', $item->id) }}" class="text-blue-400 hover:underline">Edit</a>
                                <form action="{{ route('admin.topup-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-400">
                            Belum ada data item top up yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PERBAIKAN: Tampilan Kartu untuk Mobile --}}
    {{-- Div ini hanya akan terlihat di layar kecil (di bawah 'md') --}}
    <div class="block md:hidden space-y-4">
        @forelse ($topupItems as $item)
            <div class="bg-gray-800/50 p-4 rounded-lg">
                {{-- Baris Atas: Info Game & Aksi --}}
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/logogame/' . $item->game->thumbnail) }}" alt="{{ $item->game->name }}" class="w-10 h-10 object-cover rounded-md">
                        <span class="font-semibold text-white">{{ $item->game->name }}</span>
                    </div>
                    <div class="flex gap-3 text-sm flex-shrink-0">
                        <a href="{{ route('admin.topup-items.edit', $item->id) }}" class="text-blue-400">Edit</a>
                        <form action="{{ route('admin.topup-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400">Hapus</button>
                        </form>
                    </div>
                </div>
                {{-- Baris Bawah: Info Item --}}
                <div>
                    <p class="text-gray-300">{{ $item->name }}</p>
                    <p class="font-bold text-white mt-1">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <p class="text-gray-400">Belum ada data item top up yang ditambahkan.</p>
            </div>
        @endforelse
    </div>

@endsection

{{-- Mengisi slot FAB (Floating Action Button) untuk tampilan mobile --}}
@section('fab')
    <a href="{{ route('admin.topup-items.create') }}" class="fixed bottom-6 right-6 bg-lime-400 text-black w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-lime-300 transition-transform hover:scale-110 active:scale-100">
        <i class="fas fa-plus text-2xl"></i>
    </a>
@endsection
