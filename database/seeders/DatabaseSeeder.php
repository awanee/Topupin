<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua seeder
        $this->call([
            GameSeeder::class,
            ItemTopupSeeder::class,
            PaymentMethodSeeder::class,
        ]);

        // Buat 1 user dummy manual
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
