<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\GenerateRoles;
use Tests\TestCase;

class AdminTravelTest extends TestCase
{
    use RefreshDatabase, GenerateRoles;

    public function test_public_user_cannot_access_adding_travel(): void
    {
        $response = $this->postJson('/api/travels/store');

        $response->assertStatus(401);
    }

    public function test_non_admin_user_cannot_access_adding_travel(): void
    {
        $this->generateRoles();
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name', 'editor')->value('id'));
        $response = $this->actingAs($user)->postJson('/api/travels/store');

        $response->assertStatus(403);
    }

    public function test_saves_travel_successfully_with_valid_data(): void
    {
        $this->generateRoles();
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name', 'admin')->value('id'));

        $response = $this->actingAs($user)->postJson('/api/travels/store', [
            'name' => 'Travel name'
        ]);

        $response->assertStatus(422);

        $response = $this->actingAs($user)->postJson('/api/travels/store', [
           'name' => 'Travel name',
           'is_public' => 1,
           'description' => 'Some description',
            'number_of_days' => 5
        ]);

        $response->assertStatus(201);
        $response = $this->get('api/travels');
        $response->assertJsonFragment(['name' => 'Travel name']);
    }
}
