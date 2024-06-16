<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::create([
            'capacity' => 4,
            'tabletId' => 'test-tablet-1',
        ]);
    }
}
