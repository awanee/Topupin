<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::create(['nama' => 'Mobile Legends']);
        Game::create(['nama' => 'Free Fire']);
        Game::create(['nama' => 'Valorant']);
        // Tambahkan game lain jika perlu
    }
    

}
