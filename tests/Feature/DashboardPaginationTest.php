<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('dashboard users listing shows beautiful pagination controls', function () {
    $admin = User::factory()->create(['role_id' => 1, 'status_id' => 1]);
    User::factory()->count(12)->create(['role_id' => 4, 'status_id' => 1]);

    $response = $this->actingAs($admin)->get('/dashboard/users');

    $response->assertOk();
    $response->assertSeeText('Showing');
    $response->assertSee('pagination-rounded');
    $response->assertSee('Page 1 of');
});
