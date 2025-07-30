<?php

namespace App\Http\Controllers;

use App\Models\Game; // Pastikan Anda mengimpor model Game
use Illuminate\Http\Request;
use App\Models\Category; // Pastikan Anda mengimpor model Category

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori untuk ditampilkan sebagai tombol filter
        $categories = Category::all();

        // Query dasar untuk game
        $gamesQuery = Game::query();

        // Cek jika ada request filter kategori
        if ($request->has('category')) {
            $categorySlug = $request->input('category');
            // Filter game yang memiliki kategori dengan slug yang cocok
            $gamesQuery->whereHas('categories', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        // Ambil hasil game setelah difilter (atau semua game jika tidak ada filter)
        $games = $gamesQuery->get();

        // Kirim data kategori dan game ke view
        return view('home', compact('games', 'categories'));
    }
}
