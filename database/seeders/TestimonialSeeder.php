<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Mitchell',
                'company' => 'Luxe Fashion Group',
                'role' => 'CEO',
                'quote' => 'DARDAA WEB transformed our online presence completely. The e-commerce platform they built exceeded all our expectations — conversions are up 52% and our customers love the new shopping experience. Their attention to detail and commitment to quality is unmatched.',
                'avatar' => 'https://i.pravatar.cc/150?img=1',
                'rating' => 5,
            ],
            [
                'name' => 'James Rodriguez',
                'company' => 'FinTrack Analytics',
                'role' => 'CTO',
                'quote' => 'Working with DARDAA WEB was an exceptional experience. They understood our complex requirements from day one and delivered a dashboard that our financial advisors absolutely love. The real-time data visualization is stunning.',
                'avatar' => 'https://i.pravatar.cc/150?img=3',
                'rating' => 5,
            ],
            [
                'name' => 'Emily Chen',
                'company' => 'GreenLeaf Organic',
                'role' => 'Marketing Director',
                'quote' => 'The branding work DARDAA WEB did for us was nothing short of transformative. They captured our values perfectly and created an identity that resonates with our customers. Our brand recognition has tripled since the rebrand.',
                'avatar' => 'https://i.pravatar.cc/150?img=5',
                'rating' => 5,
            ],
            [
                'name' => 'Dr. Michael Torres',
                'company' => 'MedConnect Health',
                'role' => 'Founder',
                'quote' => 'Security and user experience were our top priorities, and DARDAA WEB delivered on both fronts. The telehealth platform they built handles thousands of consultations daily with zero security incidents. Truly world-class work.',
                'avatar' => 'https://i.pravatar.cc/150?img=7',
                'rating' => 5,
            ],
            [
                'name' => 'Lisa Nakamura',
                'company' => 'TravelVista Tours',
                'role' => 'Digital Manager',
                'quote' => 'Our SEO results speak for themselves — from invisible to page one in under 6 months. DARDAA WEB\'s strategic approach to digital marketing delivered ROI that far exceeded our investment. They\'re our long-term digital partner now.',
                'avatar' => 'https://i.pravatar.cc/150?img=9',
                'rating' => 4,
            ],
            [
                'name' => 'Alex Petrov',
                'company' => 'ByteStore Inc.',
                'role' => 'Product Lead',
                'quote' => 'DARDAA WEB built our marketplace from the ground up and it\'s been rock solid. Over 5,000 vendors, millions of transactions, and 99.9% uptime. Their technical expertise and project management are top-tier.',
                'avatar' => 'https://i.pravatar.cc/150?img=11',
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
