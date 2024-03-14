<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\Tour;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $role = Role::factory()->create([
            'name' => 'admin',
        ]);

        Role::factory()->create([
            'name' => 'editor',
        ]);

        $user->roles()->attach($role);

        Travel::factory(10)->create();
        Tour::factory(20)->create();
    }
}
