<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Omar Dardaa',
                'role' => 'Founder & Creative Director',
                'bio' => 'With over 12 years of experience in digital design and development, Omar founded DARDAA WEB with a vision to create digital experiences that truly move the needle for businesses. He leads the creative direction for all major projects.',
                'photo' => 'https://i.pravatar.cc/400?img=12',
                'linkedin' => 'https://linkedin.com/in/omardardaa',
                'twitter' => 'https://twitter.com/omardardaa',
            ],
            [
                'name' => 'Aisha Benali',
                'role' => 'Head of Design',
                'bio' => 'Aisha brings a unique blend of artistic creativity and user-centered thinking to every project. Previously at Google and Spotify, she ensures every pixel serves a purpose and every interaction delights.',
                'photo' => 'https://i.pravatar.cc/400?img=23',
                'linkedin' => 'https://linkedin.com/in/aishabenali',
                'twitter' => 'https://twitter.com/aishabenali',
            ],
            [
                'name' => 'Youssef Haddad',
                'role' => 'Lead Developer',
                'bio' => 'A full-stack architect with deep expertise in Laravel, React, and cloud infrastructure. Youssef leads our engineering team and ensures every application we build is scalable, secure, and performant.',
                'photo' => 'https://i.pravatar.cc/400?img=33',
                'linkedin' => 'https://linkedin.com/in/youssefhaddad',
                'twitter' => 'https://twitter.com/youssefhaddad',
            ],
            [
                'name' => 'Leila Mansouri',
                'role' => 'SEO & Digital Strategy Lead',
                'bio' => 'Leila is a data-driven marketing strategist who has helped over 50 businesses achieve page-one rankings. Her holistic approach to digital strategy combines SEO, content marketing, and analytics.',
                'photo' => 'https://i.pravatar.cc/400?img=44',
                'linkedin' => 'https://linkedin.com/in/leilamansouri',
                'twitter' => 'https://twitter.com/leilamansouri',
            ],
            [
                'name' => 'Karim Fassi',
                'role' => 'Project Manager',
                'bio' => 'Karim ensures every project runs smoothly from kickoff to launch. With PMP certification and an agile mindset, he bridges the gap between client vision and team execution flawlessly.',
                'photo' => 'https://i.pravatar.cc/400?img=52',
                'linkedin' => 'https://linkedin.com/in/karimfassi',
                'twitter' => null,
            ],
            [
                'name' => 'Nadia El-Amin',
                'role' => 'Brand Strategist',
                'bio' => 'Nadia crafts brand identities that tell compelling stories. With a background in psychology and visual communications, she creates brand experiences that connect emotionally with target audiences.',
                'photo' => 'https://i.pravatar.cc/400?img=45',
                'linkedin' => 'https://linkedin.com/in/nadiaelamin',
                'twitter' => 'https://twitter.com/nadiaelamin',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
