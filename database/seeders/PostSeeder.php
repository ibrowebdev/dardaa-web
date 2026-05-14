<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The Future of Web Design: Trends to Watch in 2026',
                'slug' => 'future-web-design-trends-2026',
                'excerpt' => 'Explore cutting-edge design trends shaping the web in 2026.',
                'body' => '<p>The web design landscape is evolving faster than ever. As we move deeper into 2026, several transformative trends are reshaping how we think about digital experiences.</p><h2>1. AI-Powered Design Systems</h2><p>AI tools are now capable of generating entire layout systems and suggesting color palettes based on brand psychology.</p><h2>2. Immersive 3D Experiences</h2><p>With WebGPU, 3D web experiences are becoming mainstream — from product configurators to immersive storytelling.</p><h2>3. Micro-Interactions and Motion Design</h2><p>Physics-based animations that feel natural and responsive create interfaces that feel alive and intuitive.</p><h2>4. Dark Mode as Default</h2><p>Many premium brands now design dark-first, recognizing sophistication and reduced eye strain.</p><h2>5. Variable Typography</h2><p>Variable fonts enable more expressive and dynamic typography, from weight transitions on scroll to responsive type.</p>',
                'thumbnail' => 'https://picsum.photos/seed/webdesign2026/800/400',
                'category' => 'Design',
                'author' => 'Aisha Benali',
                'published_at' => '2026-05-01 10:00:00',
            ],
            [
                'title' => 'Why Your Business Needs a Custom Web Application',
                'slug' => 'why-business-needs-custom-web-application',
                'excerpt' => 'Discover why investing in a custom web application is the smartest move for growing businesses.',
                'body' => '<p>In today\'s competitive digital landscape, businesses need tools that give them an edge.</p><h2>The Limitations of Template Solutions</h2><p>Pre-built solutions come with inherent limitations — they lack specific features, customization is limited, and performance suffers.</p><h2>Benefits of Going Custom</h2><p>A custom application is built around your specific business processes, scales with your growth, and becomes a unique competitive asset.</p><h2>When to Consider Custom Development</h2><p>Consider it when you spend more time working around your tools than with them, or when growth is limited by platform constraints.</p>',
                'thumbnail' => 'https://picsum.photos/seed/customapp/800/400',
                'category' => 'Development',
                'author' => 'Youssef Haddad',
                'published_at' => '2026-04-20 09:00:00',
            ],
            [
                'title' => 'SEO in 2026: What Actually Moves the Needle',
                'slug' => 'seo-2026-what-moves-the-needle',
                'excerpt' => 'Forget outdated tactics. Here is what actually works for SEO in 2026.',
                'body' => '<p>SEO has undergone massive changes. The tactics that worked in 2020 are outdated.</p><h2>Content Quality Over Quantity</h2><p>A single comprehensive article outperforms ten thin posts.</p><h2>Core Web Vitals Are Non-Negotiable</h2><p>Sites that deliver fast, stable experiences consistently outrank slower competitors.</p><h2>E-E-A-T Is Everything</h2><p>Experience, Expertise, Authoritativeness, and Trust are the pillars of content credibility.</p><h2>Topical Authority</h2><p>Build comprehensive content clusters around core topics with strong internal linking.</p>',
                'thumbnail' => 'https://picsum.photos/seed/seo2026/800/400',
                'category' => 'SEO',
                'author' => 'Leila Mansouri',
                'published_at' => '2026-04-10 08:00:00',
            ],
            [
                'title' => 'Building a Brand That Lasts: Beyond the Logo',
                'slug' => 'building-brand-that-lasts-beyond-logo',
                'excerpt' => 'Your brand is more than a logo. Learn how to build lasting emotional connections.',
                'body' => '<p>Too many businesses confuse having a logo with having a brand.</p><h2>The Brand Iceberg</h2><p>The visible 10% is just the tip. Below lies values, voice, mission, and emotional resonance.</p><h2>Consistency Across Touchpoints</h2><p>Maintain consistency across website, social media, packaging, and customer service.</p><h2>The Power of Brand Story</h2><p>A compelling brand story creates emotional connections that transcend product features.</p>',
                'thumbnail' => 'https://picsum.photos/seed/branding/800/400',
                'category' => 'Branding',
                'author' => 'Nadia El-Amin',
                'published_at' => '2026-03-28 11:00:00',
            ],
            [
                'title' => 'E-Commerce Performance Optimization Guide',
                'slug' => 'ecommerce-performance-optimization-guide',
                'excerpt' => 'Speed kills or saves your conversions. A guide to optimizing your e-commerce site.',
                'body' => '<p>In e-commerce, every millisecond matters. A one-second delay leads to 7% reduction in conversions.</p><h2>Image Optimization</h2><p>Use WebP/AVIF, responsive images, and lazy-loading for below-the-fold content.</p><h2>Code Splitting</h2><p>Load only the JavaScript needed for the current page.</p><h2>Database Optimization</h2><p>Use eager loading, proper indexing, and caching for frequently accessed data.</p>',
                'thumbnail' => 'https://picsum.photos/seed/ecommperf/800/400',
                'category' => 'Development',
                'author' => 'Youssef Haddad',
                'published_at' => '2026-03-15 14:00:00',
            ],
            [
                'title' => 'How We Redesigned Our Agency Website',
                'slug' => 'how-we-redesigned-agency-website',
                'excerpt' => 'A behind-the-scenes look at our own website redesign process.',
                'body' => '<p>After two years, we finally redesigned our own agency website.</p><h2>Starting with Why</h2><p>We spent two weeks on strategy — interviews, analytics, competitor analysis, and goal setting.</p><h2>Design Decisions</h2><p>We chose a dark theme for premium positioning, making colorful project work pop.</p><h2>Performance First</h2><p>We set a 2-second load time budget, achieving a Lighthouse score of 98.</p>',
                'thumbnail' => 'https://picsum.photos/seed/agencyredesign/800/400',
                'category' => 'Design',
                'author' => 'Omar Dardaa',
                'published_at' => '2026-03-01 10:00:00',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
