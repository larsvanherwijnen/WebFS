<?php

namespace Database\Seeders;

use App\Enums\OrderStatuses;
use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (OrderStatuses::values() as $status) {
            OrderStatus::create([
                'status' => $status,
            ]);
        }
    }
}
