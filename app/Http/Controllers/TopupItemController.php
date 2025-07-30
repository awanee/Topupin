<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\TopupItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TopupItemController extends Controller
{
    /**
     * Menampilkan halaman pemilihan game.
     */
    public function index(): View
    {
        $games = Game::all();
        return view('admin.topup-items.index', compact('games'));
    }

    /**
     * Menampilkan item top-up untuk game yang dipilih.
     */
    public function show(Game $game): View
    {
        // Memuat item top-up yang terkait dengan game ini
        $topupItems = $game->topupItems()->get();

        return view('admin.topup-items.show', compact('game', 'topupItems'));
    }

    /**
     * Menampilkan form untuk membuat item baru untuk game yang dipilih.
     */
    public function create(Game $game): View
    {
        return view('admin.topup-items.create', compact('game'));
    }

    /**
     * Menyimpan item baru yang terkait dengan game yang dipilih.
     */
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
        ]);

        // Membuat item baru dan secara otomatis mengaitkannya dengan game_id
        $game->topupItems()->create($request->all());

        return redirect()->route('admin.topup-items.show', $game->id)
                         ->with('success', 'Item top up berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit item yang dipilih.
     */
    public function edit(TopupItem $topupItem): View
    {
        return view('admin.topup-items.edit', compact('topupItem'));
    }

    /**
     * Memperbarui item yang dipilih di database.
     */
    public function update(Request $request, TopupItem $topupItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
        ]);

        $topupItem->update($request->all());

        // Redirect kembali ke halaman detail game setelah update
        return redirect()->route('admin.topup-items.show', $topupItem->game_id)
                         ->with('success', 'Item top up berhasil diperbarui.');
    }

    /**
     * Menghapus item yang dipilih dari database.
     */
    public function destroy(TopupItem $topupItem)
    {
        $game_id = $topupItem->game_id; // Simpan game_id sebelum dihapus
        $topupItem->delete();

        return redirect()->route('admin.topup-items.show', $game_id)
                         ->with('success', 'Item top up berhasil dihapus.');
    }
}
