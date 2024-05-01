<?php

namespace Tests;

use App\Models\Role;

trait GenerateRoles
{
    private function generateRoles(): void
    {
        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'editor']);
    }
}
