{{-- Tampilan Tabel untuk Desktop --}}
<div class="hidden md:block overflow-x-auto">
    <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-800/50 text-gray-300">
            <tr>
                <th class="p-3 w-16">ID</th>
                <th class="p-3">Gambar</th>
                <th class="p-3">Nama Item</th>
                <th class="p-3">Harga</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="border-b border-gray-800">
                    <td class="p-3">{{ $item->id }}</td>
                    <td class="p-3">
                        @if($item->image)
                            {{-- Mengambil gambar dari folder assets/diamondgame --}}
                            <img src="{{ asset('assets/diamondgame/' . $item->image) }}" alt="{{ $item->name }}" class="w-16 h-auto rounded-md object-cover">
                        @else
                            <span class="text-xs text-gray-500">No Image</span>
                        @endif
                    </td>
                    <td class="p-3">{{ $item->name }}</td>
                    <td class="p-3">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="p-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.topup-items.edit', $item->id) }}" class="text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('admin.topup-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-400">Belum ada item untuk game ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Tampilan Kartu untuk Mobile --}}
<div class="block md:hidden space-y-4">
    @forelse ($items as $item)
        <div class="bg-gray-800/50 p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    @if($item->image)
                        {{-- Mengambil gambar dari folder assets/diamondgame --}}
                        <img src="{{ asset('assets/diamondgame/' . $item->image) }}" alt="{{ $item->name }}" class="w-12 h-12 rounded-md object-cover flex-shrink-0">
                    @endif
                    <div>
                        <p class="text-gray-300">{{ $item->name }}</p>
                        <p class="font-bold text-white mt-1">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
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
        </div>
    @empty
        <div class="text-center py-10">
            <p class="text-gray-400">Belum ada item untuk game ini.</p>
        </div>
    @endforelse
</div>
