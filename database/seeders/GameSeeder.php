<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Category;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data kategori yang sudah ada
        $fps = Category::where('slug', 'fps')->first();
        $moba = Category::where('slug', 'moba')->first();
        $battleRoyale = Category::where('slug', 'battle-royale')->first();
        $strategy = Category::where('slug', 'strategy')->first();

        // Buat Game dan langsung hubungkan ke Kategori

        if ($fps) {
            $valorant = Game::firstOrCreate([
                'slug' => 'valorant'
            ], [
                'name' => 'Valorant',
                'thumbnail' => 'logovalo.png',
                'logo' => 'valorant.jpg',
                'needs_server_id' => false,
            ]);
            $valorant->categories()->syncWithoutDetaching([$fps->id]);
        }

         if ($fps) {
            $valorant = Game::firstOrCreate([
                'slug' => 'Csgo'
            ], [
                'name' => 'CS:GO',
                'thumbnail' => 'csgoimage.jpg',
                'logo' => 'logocsgo.png',
                'needs_server_id' => true,
            ]);
            $valorant->categories()->syncWithoutDetaching([$fps->id]);
        }

        if ($strategy) {
            $coc = Game::firstOrCreate([
                'slug' => 'clash-of-clans'
            ], [
                'name' => 'Clash of Clans',
                'thumbnail' => 'logococ.png',
                'logo' => 'clashofclans.jpg',
                'needs_server_id' => false,
            ]);
            $coc->categories()->syncWithoutDetaching([$strategy->id]);
        }

        if ($moba) {
            $ml = Game::firstOrCreate([
                'slug' => 'mobile-legends'
            ], [
                'name' => 'Mobile Legends',
                'thumbnail' => 'mobilelegends.jpg',
                'logo' => 'logomobile.png',
                'needs_server_id' => true,
            ]);
            $ml->categories()->syncWithoutDetaching([$moba->id]);
        }

        if ($moba) {
            $genshin = Game::firstOrCreate([
                'slug' => 'genshin-impact'
            ], [
                'name' => 'Genshin Impact',
                'thumbnail' => 'genshinimpact.jpg',
                'logo' => 'genshintopup.jpeg',
                'needs_server_id' => true,
            ]);
            $genshin->categories()->syncWithoutDetaching([$moba->id]);
        }

        if ($battleRoyale) {
            $ff = Game::firstOrCreate([
                'slug' => 'free-fire'
            ], [
                'name' => 'Free Fire',
                'thumbnail' => 'freefire.jpg',
                'logo' => 'logoepep.png',
                'needs_server_id' => false,
            ]);
            $ff->categories()->syncWithoutDetaching([$battleRoyale->id]);
        }

        if ($strategy) {
            $roblox = Game::firstOrCreate([
                'slug' => 'roblox'
            ], [
                'name' => 'Roblox',
                'thumbnail' => 'roblox.jpg',
                'logo' => 'logoroblox.png',
                'needs_server_id' => false,
            ]);
            $roblox->categories()->syncWithoutDetaching([$strategy->id]);
        }

        if ($battleRoyale) {
            $pubg = Game::firstOrCreate([
                'slug' => 'pubg'
            ], [
                'name' => 'PUBG Mobile',
                'thumbnail' => 'logopubg.png',
                'logo' => 'pubgmobile.jpg',
                'needs_server_id' => true,
            ]);
            $pubg->categories()->syncWithoutDetaching([$battleRoyale->id]);
        }
    }
}
