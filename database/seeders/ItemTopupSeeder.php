<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemTopup;
use App\Models\Game;

class ItemTopupSeeder extends Seeder
{
    public function run(): void
    {
        $ml = Game::where('nama', 'Mobile Legends')->first();
        $ff = Game::where('nama', 'Free Fire')->first();

        ItemTopup::create([
            'game_id' => $ml->id,
            'name' => '86 Diamonds',
            'amount_name' => '86 DM'
        ]);

        ItemTopup::create([
            'game_id' => $ff->id,
            'name' => '70 Diamonds',
            'amount_name' => '70 DM'
        ]);
    }
}
