<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // DIUBAH: Menggunakan File facade untuk hapus manual

class GameController extends Controller
{
    /**
     * Menampilkan daftar semua game.
     */
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    /**
     * Menampilkan form untuk membuat game baru.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Menyimpan game baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:games',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'needs_server_id' => 'required|boolean',
        ]);

        $game = new Game($validatedData);
        $game->slug = $request->slug ? Str::slug($request->slug, '-') : Str::slug($request->name, '-');

        // DIUBAH: Menggunakan metode move() ke folder public/assets/logogame
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'thumbnail_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/logogame'), $filename);
            $game->thumbnail = $filename; // Hanya simpan nama file
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/logogame'), $filename);
            $game->logo = $filename; // Hanya simpan nama file
        }

        $game->save();

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit game.
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Memperbarui data game di database.
     */
    public function update(Request $request, Game $game)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:games,slug,' . $game->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'needs_server_id' => 'required|boolean',
        ]);

        $game->fill($validatedData);
        $game->slug = $request->slug ? Str::slug($request->slug, '-') : Str::slug($request->name, '-');

        // DIUBAH: Logika update file di folder public
        if ($request->hasFile('thumbnail')) {
            // Hapus file lama jika ada
            if ($game->thumbnail && File::exists(public_path('assets/logogame/' . $game->thumbnail))) {
                File::delete(public_path('assets/logogame/' . $game->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = 'thumbnail_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/logogame'), $filename);
            $game->thumbnail = $filename;
        }

        if ($request->hasFile('logo')) {
            if ($game->logo && File::exists(public_path('assets/logogame/' . $game->logo))) {
                File::delete(public_path('assets/logogame/' . $game->logo));
            }
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/logogame'), $filename);
            $game->logo = $filename;
        }

        $game->save();

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil diperbarui.');
    }

    /**
     * Menghapus game dari database.
     */
    public function destroy(Game $game)
    {
        // DIUBAH: Logika hapus file dari folder public
        if ($game->thumbnail && File::exists(public_path('assets/logogame/' . $game->thumbnail))) {
            File::delete(public_path('assets/logogame/' . $game->thumbnail));
        }
        if ($game->logo && File::exists(public_path('assets/logogame/' . $game->logo))) {
            File::delete(public_path('assets/logogame/' . $game->logo));
        }

        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil dihapus.');
    }
}
