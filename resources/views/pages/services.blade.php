@extends('layouts.app')

@section('title', 'Our Services — DARDAA WEB')
@section('meta_description', 'Explore our end-to-end digital capabilities, including Web Design, Custom Web Apps, SEO Strategy, and Brand Architecture.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-20 relative overflow-hidden hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Capabilites</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Elite <span class="gradient-text">Digital Services</span>
            </h1>
            <nav class="flex items-center justify-center gap-2 text-sm text-muted">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span>/</span>
                <span class="text-text">Services</span>
            </nav>
        </div>
    </section>

    {{-- Detailed Services Grid --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 reveal-stagger">
                @php
                    $services = [
                        [
                            'title' => 'Web Design & UX/UI Architecture',
                            'desc' => 'We don\'t use templates. We build high-converting layouts rooted in psychological triggers and premium branding. Our UX design paths eliminate cognitive friction.',
                            'deliverables' => ['Custom UI Concepting', 'Dynamic Interactive Mockups', 'Advanced Dark Theme Design', 'Comprehensive UX Research'],
                            'icon' => 'M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                        ],
                        [
                            'title' => 'High-Performance Web Development',
                            'desc' => 'Full-stack builds using Laravel and JavaScript frameworks (Vue/React/Alpine). Bulletproof architectures that offer speeds under 1.5s and ironclad data safety.',
                            'deliverables' => ['Custom CMS & Admin Panels', 'API Engine Architecture', 'Headless Infrastructure', 'Bulletproof Platform Security'],
                            'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'
                        ],
                        [
                            'title' => 'SEO Strategy & Visibility Supremacy',
                            'desc' => 'Propel your site to number 1 on high-intent terms. We run surgical technical SEO, programmatic site mappings, and tactical link acquisition campaigns.',
                            'deliverables' => ['Technical Site Audit & Fixes', 'High-Intent Content Mapping', 'Strategic Domain Authority Building', 'Core Web Vitals Maximization'],
                            'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'
                        ],
                        [
                            'title' => 'Strategic Core Branding',
                            'desc' => 'Build a visual culture that demands premium price points. We define typography rules, curated palettes, voice manuals, and distinct emblem architectures.',
                            'deliverables' => ['Logo & Emblem Architecture', 'Brand Voice & Tone Manuals', 'Corporate Typeface Systems', 'Print & Digital Ready Assets'],
                            'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'
                        ],
                        [
                            'title' => 'E-Commerce Optimization',
                            'desc' => 'High-yield online stores built with Shopify Headless or custom Laravel engines. Scaled to hundreds of thousands of concurrent hits without slow-down.',
                            'deliverables' => ['Headless Store Architecture', 'Advanced Checkout Pipelines', 'Frictionless Global Gateways', 'Behavioral Funnel Optimization'],
                            'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                        ],
                        [
                            'title' => 'Digital Market Strategy',
                            'desc' => 'Growth planning backed by computational data. We assist with product positioning, paid spend allocation models, and high-intent behavioral analysis.',
                            'deliverables' => ['Detailed Growth Pipelines', 'Paid Performance Models', 'Competitor Intelligence Rigs', 'Monthly Data Executive Analytics'],
                            'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                        ]
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="bg-surface border border-border p-10 rounded-2xl card-hover relative group flex flex-col">
                        <div class="flex items-start gap-6 mb-6">
                            <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 shrink-0 shadow-lg border border-primary/10">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}"/></svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-text group-hover:text-primary transition-colors" style="font-family: var(--font-display)">{{ $service['title'] }}</h3>
                            </div>
                        </div>
                        
                        <p class="text-muted text-sm leading-relaxed mb-8 flex-1">{{ $service['desc'] }}</p>
                        
                        <div class="border-t border-border pt-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-text mb-4" style="font-family: var(--font-display)">Key Deliverables</h4>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($service['deliverables'] as $del)
                                    <li class="flex items-center gap-2 text-sm text-muted">
                                        <svg class="w-4 h-4 text-secondary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        {{ $del }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="py-24 bg-surface border-y border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Engineered Delivery" 
                subtitle="How We Work" 
            />

            <div class="relative mt-16">
                {{-- Line connection on desktop --}}
                <div class="absolute hidden lg:block top-1/2 left-0 right-0 h-0.5 bg-gradient-to-r from-primary to-secondary -translate-y-1/2 opacity-30"></div>
                
                <div class="grid lg:grid-cols-5 gap-8 relative z-10 reveal-stagger">
                    @php
                        $steps = [
                            ['num' => '01', 'title' => 'Discovery', 'desc' => 'Deep-dive analytics workshop to define user journeys and site blueprints.'],
                            ['num' => '02', 'title' => 'Strategy', 'desc' => 'Building architecture maps, choosing technology pipelines and stacks.'],
                            ['num' => '03', 'title' => 'Design', 'desc' => 'Figma prototyping, branding layouts, micro-animation mapping.'],
                            ['num' => '04', 'title' => 'Dev', 'desc' => 'Clean-room programming via Laravel, rigorous deployment testing.'],
                            ['num' => '05', 'title' => 'Launch', 'desc' => 'Optimization audits, analytics setup and hard server push.']
                        ];
                    @endphp

                    @foreach($steps as $step)
                        <div class="bg-surface-light border border-border rounded-2xl p-6 text-center card-hover">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary text-white mx-auto flex items-center justify-center text-lg font-black mb-6 shadow-xl" style="font-family: var(--font-display)">
                                {{ $step['num'] }}
                            </div>
                            <h3 class="text-lg font-bold text-text mb-3" style="font-family: var(--font-display)">{{ $step['title'] }}</h3>
                            <p class="text-muted text-xs leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Pricing Teaser --}}
    <section class="py-24 bg-surface/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Flexible Investment Strategies" 
                subtitle="Engagement Models" 
            />

            <div class="grid md:grid-cols-3 gap-8 items-start reveal-stagger">
                {{-- Starter --}}
                <div class="glass border border-border p-8 rounded-2xl text-center flex flex-col h-full">
                    <span class="text-muted text-sm font-semibold uppercase mb-4">Brand Starter</span>
                    <div class="text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Modular</div>
                    <p class="text-muted text-sm mb-8">Ideal for established brands requiring custom design refreshes or core platform updates.</p>
                    <ul class="text-left text-sm text-muted space-y-4 mb-8 flex-1 border-t border-border/50 pt-6">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Custom UI Module Kit</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Full Responsive Layout</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> 30 Days Hypercare</li>
                    </ul>
                    <x-button href="{{ route('quote') }}" variant="secondary" class="w-full justify-center">Contact For Quote</x-button>
                </div>

                {{-- Growth (Featured) --}}
                <div class="glass border-2 border-primary p-8 rounded-2xl text-center flex flex-col h-full relative transform scale-105 z-10 shadow-2xl">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-primary to-secondary text-white font-bold text-xs tracking-widest px-4 py-1 rounded-full uppercase">Highly Rated</div>
                    <span class="text-primary text-sm font-bold uppercase mb-4 mt-2">Elite Growth</span>
                    <div class="text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Retainer</div>
                    <p class="text-muted text-sm mb-8">Complete end-to-end engineering and periodic evolution monthly support packages.</p>
                    <ul class="text-left text-sm text-muted space-y-4 mb-8 flex-1 border-t border-primary/20 pt-6">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Tailored Laravel Backend</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Premium Design & UX Kit</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Active Analytics Systems</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> High-End Technical SEO</li>
                    </ul>
                    <x-button href="{{ route('quote') }}" class="w-full justify-center">Build Scale Path</x-button>
                </div>

                {{-- Enterprise --}}
                <div class="glass border border-border p-8 rounded-2xl text-center flex flex-col h-full">
                    <span class="text-muted text-sm font-semibold uppercase mb-4">Enterprise</span>
                    <div class="text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Custom</div>
                    <p class="text-muted text-sm mb-8">Tailor-made integrations, custom API engines, and corporate migration protocols.</p>
                    <ul class="text-left text-sm text-muted space-y-4 mb-8 flex-1 border-t border-border/50 pt-6">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Tailored Software Stack</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Headless E-Commerce Rigs</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> 24/7 Incident Care Lines</li>
                    </ul>
                    <x-button href="{{ route('quote') }}" variant="secondary" class="w-full justify-center">Book Architecture Call</x-button>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section Accordion --}}
    <section class="py-24 border-t border-border bg-surface">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Frequently Asked Questions" 
                subtitle="Faq" 
            />

            <div x-data="{ active: null }" class="space-y-4 reveal">
                @php
                    $faqs = [
                        ['q' => 'How long does a custom agency project typically take?', 'a' => 'Custom corporate builds usually span between 6 to 12 weeks, depending on structural depth. We establish hard timelines during discovery and stick strictly to them.'],
                        ['q' => 'Which technology stacks do you use?', 'a' => 'We primarily engineer inside the Laravel Ecosystem for backend robustness and deploy high-fidelity interfaces via Tailwind CSS, Next.js, Vue, or Alpine.js.'],
                        ['q' => 'Will I own the code after the project ends?', 'a' => 'Absolutely. Once final settlement is reached, full intellectual property rights of codebases, visual designs, and architecture map deployments belong completely to you.'],
                        ['q' => 'Do you offer monthly growth retainer care plans?', 'a' => 'Yes. We provide monthly retainers that include technical SEO updates, server maintenance, dynamic feature extensions, and continuous UX refinement auditing.'],
                        ['q' => 'Do you build with templates or custom designs?', 'a' => 'Everything we touch is 100% custom. We construct bespoke Figma frameworks based completely around your industry data and distinct visual requirements.'],
                        ['q' => 'How do you deal with existing site migrations?', 'a' => 'We map structural redirects surgical-style. We guarantee zero SEO data loss and seamless migration of core client user payloads using programmatic data loaders.']
                    ];
                @endphp

                @foreach($faqs as $i => $faq)
                    <div class="border border-border rounded-xl bg-surface-light overflow-hidden transition-all duration-300">
                        <button @click="active === {{ $i }} ? active = null : active = {{ $i }}" 
                                class="w-full px-6 py-4 text-left flex justify-between items-center font-bold text-text hover:text-primary transition-colors"
                                style="font-family: var(--font-display)">
                            <span>{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 transform transition-transform" :class="active === {{ $i }} ? 'rotate-180 text-primary' : 'text-muted'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="active === {{ $i }}" 
                             x-collapse x-cloak
                             class="px-6 pb-4 text-sm text-muted leading-relaxed border-t border-border/30 pt-4 bg-surface/50">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
