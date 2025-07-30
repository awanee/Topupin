<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\TopupItem;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File; // Menggunakan File facade

class TopupItemController extends Controller
{
    // ... (method index, show, create, edit tetap sama)
    public function index(): View
    {
        $games = Game::all();
        return view('admin.topup-items.index', compact('games'));
    }

    public function show(Game $game): View
    {
        $topupItems = $game->topupItems()->get();
        return view('admin.topup-items.show', compact('game', 'topupItems'));
    }

    public function create(Game $game): View
    {
        return view('admin.topup-items.create', compact('game'));
    }

    public function edit(TopupItem $topupItem): View
    {
        return view('admin.topup-items.edit', compact('topupItem'));
    }


    /**
     * Menyimpan item baru ke database.
     */
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $item = new TopupItem();
        $item->name = $request->name;
        $item->price = $request->price;

        // DIUBAH: Logika upload disamakan persis dengan GameController
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'item_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/diamondgame'), $filename);
            $item->image = $filename;
        }

        $game->topupItems()->save($item);

        return redirect()->route('admin.topup-items.show', $game->id)
                         ->with('success', 'Item top up berhasil ditambahkan.');
    }

    /**
     * Memperbarui item yang dipilih di database.
     */
    public function update(Request $request, TopupItem $topupItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $topupItem->name = $request->name;
        $topupItem->price = $request->price;

        // DIUBAH: Logika update gambar disamakan persis dengan GameController
        if ($request->hasFile('image')) {
            if ($topupItem->image && File::exists(public_path('assets/diamondgame/' . $topupItem->image))) {
                File::delete(public_path('assets/diamondgame/' . $topupItem->image));
            }
            $file = $request->file('image');
            $filename = 'item_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/diamondgame'), $filename);
            $topupItem->image = $filename;
        }

        $topupItem->save();

        return redirect()->route('admin.topup-items.show', $topupItem->game_id)
                         ->with('success', 'Item top up berhasil diperbarui.');
    }

    /**
     * Menghapus item yang dipilih dari database.
     */
    public function destroy(TopupItem $topupItem)
    {
        $game_id = $topupItem->game_id;

        if ($topupItem->image && File::exists(public_path('assets/diamondgame/' . $topupItem->image))) {
            File::delete(public_path('assets/diamondgame/' . $topupItem->image));
        }

        $topupItem->delete();

        return redirect()->route('admin.topup-items.show', $game_id)
                         ->with('success', 'Item top up berhasil dihapus.');
    }
}
