<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

test('admin login page is accessible', function () {
    $response = $this->get(route('admin.login'));

    $response->assertStatus(200);
    $response->assertSee('Administrative Panel');
});

test('admins can authenticate with valid credentials', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => Hash::make('Password123'),
    ]);

    $response = $this->post(route('admin.login.submit'), [
        'email' => 'tester@agency.com',
        'password' => 'Password123',
    ]);

    $response->assertRedirect(route('admin.dashboard'));
    $this->assertAuthenticatedAs($admin, 'admin');
});

test('admins cannot authenticate with invalid credentials', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => Hash::make('Password123'),
    ]);

    $response = $this->post(route('admin.login.submit'), [
        'email' => 'tester@agency.com',
        'password' => 'WrongPassword',
    ]);

    $response->assertSessionHasErrors('email');
    $this->assertGuest('admin');
});

test('admins can logout successfully', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => Hash::make('Password123'),
    ]);

    $this->actingAs($admin, 'admin');

    $response = $this->post(route('admin.logout'));

    $response->assertRedirect(route('admin.login'));
    $this->assertGuest('admin');
});
