<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::create(['name' => 'DANA']);
        PaymentMethod::create(['name' => 'OVO']);
        PaymentMethod::create(['name' => 'GOPAY']);
        PaymentMethod::create(['name' => 'ShopeePay']);
        PaymentMethod::create(['name' => 'Bank Transfer']);
    }
}
