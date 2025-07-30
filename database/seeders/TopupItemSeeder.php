<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\TopupItem;

class TopupItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        TopupItem::truncate();

        // --- Data untuk Valorant ---
        $valorantGame = Game::where('slug', 'valorant')->first();
        if ($valorantGame) {
            $items = [
                ['name' => '53 VP', 'price' => 14500, 'image' => 'valorant.jpg'],
                ['name' => '154 VP', 'price' => 28500, 'image' => 'valorant.jpg'],
                ['name' => '256 VP', 'price' => 45000, 'image' => 'valorant.jpg'],
                ['name' => '503 VP', 'price' => 70000, 'image' => 'valorant.jpg'],
                ['name' => '1010 VP', 'price' => 140000, 'image' => 'valorant.jpg'],
                ['name' => '2020 VP', 'price' => 280000, 'image' => 'valorant.jpg'],
                ['name' => '4520 VP', 'price' => 600000, 'image' => 'valorant.jpg'],

            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $valorantGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }
        // --- Data untuk CS:GO ---
         $csgoGame = Game::where('slug', 'csgo')->first();
        if ($csgoGame) {
            $items = [
                ['name' => '1000 Steam Wallet', 'price' => 15000, 'image' => 'steamwallet.webp'],
                ['name' => '2500 Steam Wallet', 'price' => 35000, 'image' => 'steamwallet.webp'],
                ['name' => '5000 Steam Wallet', 'price' => 70000, 'image' => 'steamwallet.webp'],
                ['name' => '10000 Steam Wallet', 'price' => 140000, 'image' => 'steamwallet.webp'],
                ['name' => '20000 Steam Wallet', 'price' => 280000, 'image' => 'steamwallet.webp'],
                ['name' => '50000 Steam Wallet', 'price' => 600000, 'image' => 'steamwallet.webp'],
                ['name' => '100000 Steam Wallet', 'price' => 1200000, 'image' => 'steamwallet.webp'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $csgoGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }

        // --- Data untuk Mobile Legends ---
        $mlGame = Game::where('slug', 'mobile-legends')->first();
        if ($mlGame) {
            $items = [
                ['name' => '86 Diamonds', 'price' => 15000, 'image' => 'diamondml.jpg'],
                ['name' => '172 Diamonds', 'price' => 25000, 'image' => 'diamondml.jpg'],
                ['name' => '347 Diamonds', 'price' => 75000, 'image' => 'diamondml.jpg'],
                ['name' => '607 Diamonds', 'price' => 140000, 'image' => 'diamondml.jpg'],
                ['name' => '1507 Diamonds', 'price' => 300000, 'image' => 'diamondml.jpg'],
                ['name' => '3257 Diamonds', 'price' => 750000, 'image' => 'diamondml.jpg'],
                ['name' => '5157 Diamonds', 'price' => 1500000, 'image' => 'diamondml.jpg'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $mlGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }

        // --- Data untuk Clash of Clans ---
        $cocGame = Game::where('slug', 'clash-of-clans')->first();
        if ($cocGame) {
            $items = [
                ['name' => '80 Gems', 'price' => 15000, 'image' => 'diamondcoc.png'],
                ['name' => '500 Gems', 'price' => 79000, 'image' => 'diamondcoc.png'],
                ['name' => '1000 Gems', 'price' => 55000, 'image' => 'diamondcoc.png'],
                ['name' => '1200 Gems', 'price' => 159000, 'image' => 'diamondcoc.png'],
                ['name' => '3000 Gems', 'price' => 300000, 'image' => 'diamondcoc.png'],
                ['name' => '5000 Gems', 'price' => 600000, 'image' => 'diamondcoc.png'],
                ['name' => '10000 Gems', 'price' => 1000000, 'image' => 'diamondcoc.png'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $cocGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }

         $genshinGame = Game::where('slug', 'genshin-impact')->first();
        if ($genshinGame) {
            $items = [
                ['name' => '60 Genesis Crystals', 'price' => 14865, 'image' => 'primogem.webp'],
                ['name' => '330 Genesis Crystals', 'price' => 72973, 'image' => 'primogem.webp'],
                ['name' => '1090 Genesis Crystals', 'price' => 229730, 'image' => 'primogem.webp'],
                ['name' => '2240 Genesis Crystals', 'price' => 440541, 'image' => 'primogem.webp'],
                ['name' => '3880 Genesis Crystals', 'price' => 734234, 'image' => 'primogem.webp'],
                ['name' => '8080 Genesis Crystals', 'price' => 1467568, 'image' => 'primogem.webp'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $genshinGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }

        $freefireGame = Game::where('slug', 'free-fire')->first();
        if ($freefireGame) {
            $items = [
                ['name' => '80 Diamonds', 'price' => 15000, 'image' => 'diamondff.jpg'],
                ['name' => '500 Diamonds', 'price' => 79000, 'image' => 'diamondff.jpg'],
                ['name' => '1200 Diamonds', 'price' => 159000, 'image' => 'diamondff.jpg'],
                ['name' => '7240 Diamonds', 'price' => 918379, 'image' => 'diamondff.jpg'],
                ['name' => '8020 Diamonds', 'price' => 1002817, 'image' => 'diamondff.jpg'],
                ['name' => '14500 Diamonds', 'price' => 1823295, 'image' => 'diamondff.jpg'],
                ['name' => '36500 Diamonds', 'price' => 4558230, 'image' => 'diamondff.jpg'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $freefireGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }

        $robloxGame = Game::where('slug', 'roblox')->first();
        if ($robloxGame) {
            $items = [
                ['name' => '500 Robux', 'price' => 90000, 'image' => 'robux.png'],
                ['name' => '1000 Robux', 'price' => 180000, 'image' => 'robux.png'],
                ['name' => '2000 Robux', 'price' => 360000, 'image' => 'robux.png'],
                ['name' => '5250 Robux', 'price' => 900000, 'image' => 'robux.png'],
                ['name' => '11000 Robux', 'price' => 1799000, 'image' => 'robux.png'],
                ['name' => '24000 Robux', 'price' => 3599000, 'image' => 'robux.png'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $robloxGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }

        $pubgGame = Game::where('slug', 'pubg')->first();
        if ($pubgGame) {
            $items = [
                ['name' => '60 UC', 'price' => 15000, 'image' => 'ucpubg.jpg'],
                ['name' => '120 UC', 'price' => 28640, 'image' => 'ucpubg.jpg'],
                ['name' => '180 UC', 'price' => 42960, 'image' => 'ucpubg.jpg'],
                ['name' => '240 UC', 'price' => 57280, 'image' => 'ucpubg.jpg'],
                ['name' => '325 UC', 'price' => 72278, 'image' => 'ucpubg.jpg'],
                ['name' => '505 UC', 'price' => 115238, 'image' => 'ucpubg.jpg'],
                ['name' => '1000 UC', 'price' => 259114, 'image' => 'ucpubg.jpg'],
            ];
            foreach ($items as $item) {
                TopupItem::create([
                    'game_id' => $pubgGame->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                ]);
            }
        }


    }
}
