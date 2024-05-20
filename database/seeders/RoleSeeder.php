<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Roles::values() as $status) {
            \App\Models\Role::create([
                'role' => $status
            ]);
        }
    }
}
