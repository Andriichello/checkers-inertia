<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'One',
                'email' => 'one@example.com',
            ]);

        User::factory()
            ->create([
                'name' => 'Two',
                'email' => 'two@example.com',
            ]);

        User::factory()
            ->create([
                'name' => 'Three',
                'email' => 'three@example.com',
            ]);
    }
}
