<?php

use App\Models\Admin;
use App\Models\Setting;

test('admins can view the global settings form', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => bcrypt('Password123'),
    ]);

    $response = $this->actingAs($admin, 'admin')
                     ->get(route('admin.settings.index'));

    $response->assertStatus(200);
    $response->assertSee('Agency Identity');
});

test('admins can bulk update key-value configurations', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => bcrypt('Password123'),
    ]);

    $payload = [
        'settings' => [
            'agency_name' => 'New Brand Title',
            'tagline' => 'Testing update functional flow',
            'contact_email' => 'support@tester.com',
        ]
    ];

    $response = $this->actingAs($admin, 'admin')
                     ->post(route('admin.settings.update'), $payload);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('settings', [
        'key' => 'agency_name',
        'value' => 'New Brand Title',
    ]);

    expect(Setting::get('agency_name'))->toBe('New Brand Title');
    expect(Setting::get('tagline'))->toBe('Testing update functional flow');
});
