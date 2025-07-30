<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category; // Import model Category
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        // PERBAIKAN: Mengambil semua kategori untuk ditampilkan di form
        $categories = Category::all();
        return view('admin.games.create', compact('categories'));
    }

    /**
     * Menyimpan game baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:games,name',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'needs_server_id' => 'required|boolean',
            'category_id' => 'required|exists:categories,id', // Validasi input kategori
        ]);

        $game = new Game();
        $game->name = $request->name;
        $game->slug = Str::slug($request->name, '-');
        $game->needs_server_id = $request->needs_server_id;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'thumbnail_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/logogame'), $filename);
            $game->thumbnail = $filename;
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/logogame'), $filename);
            $game->logo = $filename;
        }

        $game->save(); // Simpan game terlebih dahulu

        // PERBAIKAN: Tautkan game dengan kategori yang dipilih
        $game->categories()->attach($request->category_id);

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit game.
     */
    public function edit(Game $game)
    {
        // PERBAIKAN: Mengambil semua kategori untuk ditampilkan di form
        $categories = Category::all();
        return view('admin.games.edit', compact('game', 'categories'));
    }

    /**
     * Memperbarui data game di database.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:games,name,' . $game->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'needs_server_id' => 'required|boolean',
            'category_id' => 'required|exists:categories,id', // Validasi input kategori
        ]);

        $game->name = $request->name;
        $game->needs_server_id = $request->needs_server_id;
        // Slug tidak diubah untuk menjaga konsistensi URL

        if ($request->hasFile('thumbnail')) {
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

        $game->save(); // Simpan perubahan pada game

        // PERBAIKAN: Sinkronkan kategori game dengan yang dipilih
        $game->categories()->sync($request->category_id);

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil diperbarui.');
    }

    /**
     * Menghapus game dari database.
     */
    public function destroy(Game $game)
    {
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
