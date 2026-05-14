<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class,
            TestimonialSeeder::class,
            TeamMemberSeeder::class,
            PostSeeder::class,
            JobSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
