<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Senior Full-Stack Developer',
                'slug' => 'senior-full-stack-developer',
                'type' => 'Full-time',
                'location' => 'Remote / Casablanca',
                'department' => 'Engineering',
                'description' => '<h2>About the Role</h2><p>We are looking for a Senior Full-Stack Developer to join our engineering team. You will work on complex web applications for our diverse portfolio of clients, from startups to enterprise organizations.</p><h2>Responsibilities</h2><ul><li>Architect and build scalable web applications using Laravel and modern JS frameworks</li><li>Collaborate with designers to implement pixel-perfect, responsive interfaces</li><li>Mentor junior developers and conduct code reviews</li><li>Optimize application performance and ensure security best practices</li><li>Participate in client meetings to understand and translate requirements</li></ul><h2>Requirements</h2><ul><li>5+ years of experience with PHP/Laravel</li><li>Strong proficiency in JavaScript (Vue.js or React)</li><li>Experience with MySQL, PostgreSQL, and Redis</li><li>Understanding of CI/CD pipelines and cloud deployments (AWS/GCP)</li><li>Excellent communication skills in English (French is a plus)</li></ul><h2>Benefits</h2><ul><li>Competitive salary + performance bonuses</li><li>Flexible remote work policy</li><li>Annual learning budget of $2,000</li><li>Health insurance coverage</li><li>Latest MacBook Pro and equipment</li></ul>',
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Designer',
                'slug' => 'ui-ux-designer',
                'type' => 'Full-time',
                'location' => 'Casablanca, Morocco',
                'department' => 'Design',
                'description' => '<h2>About the Role</h2><p>Join our design team to create stunning, user-centered digital experiences. You will work across multiple projects, from branding to complex web applications.</p><h2>Responsibilities</h2><ul><li>Create wireframes, prototypes, and high-fidelity designs in Figma</li><li>Conduct user research and usability testing</li><li>Develop and maintain design systems</li><li>Collaborate closely with developers for accurate implementation</li><li>Present design concepts and rationale to clients</li></ul><h2>Requirements</h2><ul><li>3+ years of UI/UX design experience</li><li>Expert proficiency in Figma and Adobe Creative Suite</li><li>Strong portfolio demonstrating user-centered design process</li><li>Understanding of HTML/CSS and design feasibility</li><li>Experience with motion design and interaction patterns</li></ul>',
                'is_active' => true,
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'slug' => 'digital-marketing-specialist',
                'type' => 'Full-time',
                'location' => 'Remote',
                'department' => 'Marketing',
                'description' => '<h2>About the Role</h2><p>We need a data-driven Digital Marketing Specialist to manage SEO, content strategy, and paid campaigns for our clients.</p><h2>Responsibilities</h2><ul><li>Develop and execute SEO strategies for client websites</li><li>Manage Google Ads and social media advertising campaigns</li><li>Create content calendars and coordinate with writers</li><li>Analyze campaign performance and provide actionable reports</li><li>Stay current with algorithm updates and industry trends</li></ul><h2>Requirements</h2><ul><li>3+ years of digital marketing experience</li><li>Proficiency with SEMrush, Ahrefs, Google Analytics</li><li>Experience managing PPC campaigns with proven ROI</li><li>Strong analytical and communication skills</li><li>Google Ads and Analytics certifications preferred</li></ul>',
                'is_active' => true,
            ],
            [
                'title' => 'Junior Frontend Developer',
                'slug' => 'junior-frontend-developer',
                'type' => 'Full-time',
                'location' => 'Casablanca, Morocco',
                'department' => 'Engineering',
                'description' => '<h2>About the Role</h2><p>A great opportunity for an early-career frontend developer to grow within a world-class team.</p><h2>Responsibilities</h2><ul><li>Build responsive web interfaces using modern CSS and JavaScript</li><li>Work with senior developers to implement design mockups</li><li>Write clean, tested, and well-documented code</li><li>Participate in daily stand-ups and sprint planning</li></ul><h2>Requirements</h2><ul><li>1+ years of experience or strong portfolio projects</li><li>Proficiency in HTML, CSS, JavaScript</li><li>Familiarity with Vue.js, React, or Alpine.js</li><li>Understanding of responsive design principles</li><li>Eagerness to learn and grow</li></ul>',
                'is_active' => true,
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
