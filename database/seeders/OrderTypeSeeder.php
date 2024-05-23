<?php

namespace Database\Seeders;

use App\Enums\OrderTypes;
use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (OrderTypes::values() as $status) {
            OrderType::create([
                'type' => $status,
            ]);
        }
    }
}
