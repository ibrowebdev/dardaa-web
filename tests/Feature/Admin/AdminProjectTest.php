<?php

use App\Models\Admin;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

test('admins can view project index catalog', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => bcrypt('Password123'),
    ]);

    $response = $this->actingAs($admin, 'admin')
                     ->get(route('admin.projects.index'));

    $response->assertStatus(200);
    $response->assertSee('Portfolio Library');
});

test('admins can successfully create a new portfolio project', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => bcrypt('Password123'),
    ]);

    $file = UploadedFile::fake()->image('cover.jpg');

    $payload = [
        'title' => 'Innovative Fintech App',
        'slug' => 'innovative-fintech-app',
        'description' => 'Short summary text',
        'category' => 'Development',
        'image' => $file,
    ];

    $response = $this->actingAs($admin, 'admin')
                     ->post(route('admin.projects.store'), $payload);

    $response->assertRedirect(route('admin.projects.index'));
    $this->assertDatabaseHas('projects', [
        'title' => 'Innovative Fintech App',
        'slug' => 'innovative-fintech-app',
    ]);

    $project = Project::where('slug', 'innovative-fintech-app')->first();
    expect($project->image)->not->toBeNull();
});

test('admins can delete portfolio project records', function () {
    $admin = Admin::create([
        'name' => 'Test Admin',
        'email' => 'tester@agency.com',
        'password' => bcrypt('Password123'),
    ]);

    $project = Project::create([
        'title' => 'To Be Deleted',
        'slug' => 'to-be-deleted',
        'category' => 'SEO',
        'description' => 'Test desc',
        'image' => 'projects/fake.jpg',
    ]);

    $response = $this->actingAs($admin, 'admin')
                     ->delete(route('admin.projects.destroy', $project));

    $response->assertRedirect(route('admin.projects.index'));
    $this->assertDatabaseMissing('projects', [
        'id' => $project->id,
    ]);
});
