<?php

use App\Models\Admin;

test('guests are redirected to admin login from dashboard', function () {
    $response = $this->get(route('admin.dashboard'));

    $response->assertRedirect(route('admin.login'));
});

test('authenticated admins can view the dashboard metrics', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => bcrypt('Password123'),
    ]);

    $response = $this->actingAs($admin, 'admin')
                     ->get(route('admin.dashboard'));

    $response->assertStatus(200);
    $response->assertSee('Administrative Overview');
});
