<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create super admin
        User::factory()->create([
            'name'              => 'Janira Care',
            'email'             => 'info@janiracare.ch',
            'is_admin'          => true,
            'can_view_clients'  => true,
            'can_view_messages' => true,
        ]);

        $this->call(CantonSeeder::class);
    }
}
