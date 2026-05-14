<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Luxe Fashion E-Commerce',
                'slug' => 'luxe-fashion-ecommerce',
                'category' => 'E-Commerce',
                'description' => 'A premium fashion e-commerce platform with AI-powered recommendations, AR try-on, and seamless checkout experience.',
                'body' => '<h2>Project Overview</h2><p>Luxe Fashion needed a cutting-edge e-commerce platform that would set them apart in the competitive fashion industry. Our team delivered a stunning, high-performance storefront with advanced personalization features.</p><h2>The Challenge</h2><p>The client wanted to increase online conversions by 40% while maintaining their luxury brand identity. They needed an intuitive shopping experience with features like virtual try-on and AI-driven product suggestions.</p><h2>Our Solution</h2><p>We built a custom Laravel-powered backend with a React frontend, integrating AR try-on technology and a machine learning recommendation engine. The design features elegant animations, a sophisticated color palette, and premium typography.</p><h2>Results</h2><ul><li>52% increase in online conversions</li><li>38% reduction in cart abandonment</li><li>4.8/5 average user satisfaction rating</li><li>200% increase in mobile traffic</li></ul><h2>Tech Stack</h2><p>Laravel, React, TailwindCSS, PostgreSQL, Redis, AWS, TensorFlow.js</p>',
                'image' => 'https://picsum.photos/seed/luxe/800/600',
                'client' => 'Luxe Fashion Group',
                'url' => 'https://luxefashion.example.com',
            ],
            [
                'title' => 'FinTrack Dashboard',
                'slug' => 'fintrack-dashboard',
                'category' => 'Web Design',
                'description' => 'A real-time financial analytics dashboard with interactive charts, portfolio tracking, and automated reporting.',
                'body' => '<h2>Project Overview</h2><p>FinTrack required a sophisticated analytics dashboard for their financial advisory clients. The platform needed to handle real-time data feeds and present complex financial data in an intuitive manner.</p><h2>The Challenge</h2><p>Displaying large volumes of financial data without overwhelming users, while maintaining sub-second response times for real-time market data.</p><h2>Our Solution</h2><p>We developed a responsive dashboard with drag-and-drop widgets, real-time WebSocket data streams, and interactive D3.js visualizations. The dark-themed interface reduces eye strain during extended trading sessions.</p><h2>Results</h2><ul><li>95% reduction in report generation time</li><li>60% improvement in data accessibility</li><li>Adopted by 15,000+ financial advisors</li><li>99.99% uptime since launch</li></ul><h2>Tech Stack</h2><p>Vue.js, Laravel, D3.js, WebSockets, MySQL, Docker, Kubernetes</p>',
                'image' => 'https://picsum.photos/seed/fintrack/800/600',
                'client' => 'FinTrack Analytics',
                'url' => 'https://fintrack.example.com',
            ],
            [
                'title' => 'GreenLeaf Organic Branding',
                'slug' => 'greenleaf-organic-branding',
                'category' => 'Branding',
                'description' => 'Complete brand identity redesign for an organic food company, including logo, packaging, and digital presence.',
                'body' => '<h2>Project Overview</h2><p>GreenLeaf Organic was transitioning from a local farm to a national brand. They needed a cohesive brand identity that communicated their commitment to sustainability and organic farming.</p><h2>The Challenge</h2><p>Creating a brand that appeals to health-conscious millennials while maintaining authenticity and the company\'s farm-to-table heritage.</p><h2>Our Solution</h2><p>We developed a complete brand system including a nature-inspired logo, earthy color palette, sustainable packaging design, and a comprehensive brand guidelines document. The digital presence was built to reflect the same organic, clean aesthetic.</p><h2>Results</h2><ul><li>Brand recognition increased by 300%</li><li>45% increase in retail partnerships</li><li>Social media following grew by 500%</li><li>Featured in Design Awards 2025</li></ul><h2>Tech Stack</h2><p>Adobe Creative Suite, Figma, WordPress, WooCommerce</p>',
                'image' => 'https://picsum.photos/seed/greenleaf/800/600',
                'client' => 'GreenLeaf Organic',
                'url' => 'https://greenleaf.example.com',
            ],
            [
                'title' => 'MedConnect Telehealth',
                'slug' => 'medconnect-telehealth',
                'category' => 'Web Design',
                'description' => 'A HIPAA-compliant telehealth platform connecting patients with healthcare providers through video consultations.',
                'body' => '<h2>Project Overview</h2><p>MedConnect needed a secure, user-friendly telehealth platform that could handle thousands of concurrent video consultations while maintaining HIPAA compliance.</p><h2>The Challenge</h2><p>Building a platform that elderly patients could navigate easily while meeting strict healthcare security standards and handling high-volume video streaming.</p><h2>Our Solution</h2><p>We created an accessible, intuitive interface with one-click video consultations, integrated electronic health records, prescription management, and automated appointment scheduling. The platform uses end-to-end encryption and is fully HIPAA compliant.</p><h2>Results</h2><ul><li>100,000+ consultations in first 6 months</li><li>98% patient satisfaction rate</li><li>40% reduction in no-show appointments</li><li>Full HIPAA compliance certification</li></ul><h2>Tech Stack</h2><p>Next.js, Node.js, WebRTC, PostgreSQL, AWS HIPAA, Redis</p>',
                'image' => 'https://picsum.photos/seed/medconnect/800/600',
                'client' => 'MedConnect Health',
                'url' => 'https://medconnect.example.com',
            ],
            [
                'title' => 'TravelVista SEO Campaign',
                'slug' => 'travelvista-seo-campaign',
                'category' => 'SEO',
                'description' => 'Comprehensive SEO strategy that propelled a travel agency from page 5 to position 1 for 50+ competitive keywords.',
                'body' => '<h2>Project Overview</h2><p>TravelVista, a boutique travel agency, was struggling with online visibility. They needed a comprehensive SEO strategy to compete with larger agencies.</p><h2>The Challenge</h2><p>The travel industry is one of the most competitive SEO landscapes. TravelVista had minimal online presence and was competing against agencies with decades of domain authority.</p><h2>Our Solution</h2><p>We implemented a multi-faceted SEO strategy including technical SEO audit and fixes, content strategy with 200+ travel guides, local SEO optimization, link building campaigns, and Core Web Vitals optimization.</p><h2>Results</h2><ul><li>Position 1 ranking for 52 competitive keywords</li><li>340% increase in organic traffic</li><li>280% increase in online bookings</li><li>Domain authority increased from 15 to 58</li></ul><h2>Tech Stack</h2><p>Ahrefs, SEMrush, Google Analytics, Google Search Console, Schema.org</p>',
                'image' => 'https://picsum.photos/seed/travelvista/800/600',
                'client' => 'TravelVista Tours',
                'url' => 'https://travelvista.example.com',
            ],
            [
                'title' => 'ByteStore Marketplace',
                'slug' => 'bytestore-marketplace',
                'category' => 'E-Commerce',
                'description' => 'A multi-vendor digital marketplace for software tools, templates, and digital assets with subscription model.',
                'body' => '<h2>Project Overview</h2><p>ByteStore envisioned becoming the go-to marketplace for digital assets. They needed a scalable platform that could support thousands of vendors and millions of transactions.</p><h2>The Challenge</h2><p>Building a marketplace that handles digital asset delivery, vendor payouts, subscription management, and fraud prevention while maintaining a delightful user experience.</p><h2>Our Solution</h2><p>We built a comprehensive marketplace platform with automated vendor onboarding, secure digital asset delivery, Stripe Connect for payouts, and a sophisticated search and discovery system with AI-powered recommendations.</p><h2>Results</h2><ul><li>5,000+ vendors onboarded in first year</li><li>$2M+ in digital asset sales</li><li>99.9% successful delivery rate</li><li>Average vendor revenue up 150%</li></ul><h2>Tech Stack</h2><p>Laravel, Vue.js, Stripe Connect, Elasticsearch, AWS S3, Redis</p>',
                'image' => 'https://picsum.photos/seed/bytestore/800/600',
                'client' => 'ByteStore Inc.',
                'url' => 'https://bytestore.example.com',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
