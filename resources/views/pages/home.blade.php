@extends('layouts.app')

@section('title', 'DARDAA WEB — Premium Digital Agency & Web Development')
@section('meta_description', 'Crafting sleek, high-performance, premium web experiences. We specialize in web design, development, branding, and digital strategy.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden hero-gradient">
        <div class="absolute top-1/4 left-1/3 w-96 h-96 bg-primary/10 rounded-full filter blur-[100px] animate-float" style="animation-duration: 10s;"></div>
        <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-secondary/10 rounded-full filter blur-[80px] animate-float" style="animation-duration: 7s; animation-delay: 2s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full py-12 md:py-24">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 text-left animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full glass border-primary/30 text-primary text-xs font-semibold tracking-widest uppercase mb-6">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        Premium Web Agency
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight tracking-tight mb-6 text-text" style="font-family: var(--font-display)">
                        We Engineer <br>
                        <span class="gradient-text">Digital Mastery</span>
                    </h1>
                    <p class="text-muted text-lg md:text-xl leading-relaxed mb-8 max-w-2xl">
                        We are a sleek, high-end web agency shaping next-generation digital identities. Through pixel-perfect engineering and avant-garde design, we help brands lead, not follow.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <x-button href="{{ route('portfolio') }}">
                            View Our Work
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </x-button>
                        <x-button href="{{ route('quote') }}" variant="secondary">
                            Get a Quote
                        </x-button>
                    </div>
                </div>
                <div class="lg:col-span-5 hidden lg:block animate-float">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-3xl filter blur-2xl opacity-50"></div>
                        <div class="glass rounded-3xl p-4 border-white/5 relative border overflow-hidden">
                            <img src="https://picsum.photos/seed/agency-hero/600/500" alt="Premium Showcase" class="rounded-2xl w-full h-auto shadow-2xl object-cover mix-blend-lighten">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Animated Statistics --}}
    <section class="border-y border-border bg-surface relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-primary mb-2" style="font-family: var(--font-display)" data-counter data-target="120" data-suffix="+">0</div>
                    <div class="text-muted text-sm font-medium uppercase tracking-wider">Projects Completed</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-secondary mb-2" style="font-family: var(--font-display)" data-counter data-target="8" data-suffix="+">0</div>
                    <div class="text-muted text-sm font-medium uppercase tracking-wider">Years Experience</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-text mb-2" style="font-family: var(--font-display)" data-counter data-target="40" data-suffix="+">0</div>
                    <div class="text-muted text-sm font-medium uppercase tracking-wider">Satisfied Clients</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-primary mb-2" style="font-family: var(--font-display)" data-counter data-target="99" data-suffix="%">0</div>
                    <div class="text-muted text-sm font-medium uppercase tracking-wider">Satisfaction Rate</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Overview --}}
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Crafting Digital Excellence" 
                subtitle="What We Do" 
            />

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                @php
                    $services = [
                        ['title' => 'Web Design', 'desc' => 'Sleek, immersive user interfaces designed to leave a lasting impact and capture user attention instantly.', 'icon' => 'M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        ['title' => 'Web Development', 'desc' => 'High-performance, robust architectures engineered using Laravel and Next.js for enterprise scalability.', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                        ['title' => 'SEO Mastery', 'desc' => 'Hyper-targeted organic search campaigns to skyrocket your ranking, build authority, and drive conversions.', 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
                        ['title' => 'Core Branding', 'desc' => 'Comprehensive visual identities that define culture, voice, and resonate profoundly with your market.', 'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
                        ['title' => 'E-Commerce Solutions', 'desc' => 'Next-generation digital stores optimized for friction-free checkout flow, security, and global sales.', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                        ['title' => 'Digital Strategy', 'desc' => 'Holistic growth plans rooted in rigorous market analytics and data-driven behavioral metrics.', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z']
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="bg-surface border border-border p-8 rounded-2xl card-hover flex flex-col items-start group">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-text mb-3" style="font-family: var(--font-display)">{{ $service['title'] }}</h3>
                        <p class="text-muted text-sm leading-relaxed mb-6 flex-1">{{ $service['desc'] }}</p>
                        <a href="{{ route('services') }}" class="text-sm font-semibold text-primary hover:text-white transition-colors flex items-center gap-1">
                            Learn More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured Projects Grid --}}
    <section class="py-24 bg-surface/50 border-y border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                <div>
                    <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Our Work</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-text" style="font-family: var(--font-display)">Featured Projects</h2>
                </div>
                <x-button href="{{ route('portfolio') }}" variant="secondary" class="mt-4 md:mt-0">
                    View All Projects
                </x-button>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                @forelse($projects as $project)
                    <x-project-card :project="$project" />
                @empty
                    <p class="text-muted italic col-span-3 text-center">Featured projects coming soon.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">The Standard</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Why Brands Choose <br>DARDAA WEB</h2>
                    <p class="text-muted mb-8 leading-relaxed">
                        We aren't just a service provider; we're digital partners committed to engineering supremacy. We build for longevity, scale, and distinct aesthetic identity.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-full bg-primary/20 flex items-center justify-center text-primary shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-text" style="font-family: var(--font-display)">Premium Visual Polish</h4>
                                <p class="text-muted text-sm">Bespoke user interfaces that stand out from boilerplate templates.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-full bg-secondary/20 flex items-center justify-center text-secondary shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-text" style="font-family: var(--font-display)">Optimized Performance</h4>
                                <p class="text-muted text-sm">Lightning-fast speeds leading to better search ranks and conversions.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-full bg-primary/20 flex items-center justify-center text-primary shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-text" style="font-family: var(--font-display)">State-of-the-Art Tech</h4>
                                <p class="text-muted text-sm">Modern stacks using Laravel and headless architectures for safety and scalability.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-full bg-secondary/20 flex items-center justify-center text-secondary shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-text" style="font-family: var(--font-display)">Uncompromising Support</h4>
                                <p class="text-muted text-sm">We guide you from architecture to launch and long-term continuous iteration.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative reveal hidden lg:block">
                    <img src="https://picsum.photos/fruit/why-us/600/600" alt="Why DARDAA WEB" class="rounded-3xl w-full shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    {{-- Client Testimonials Carousel --}}
    <section class="py-24 bg-surface overflow-hidden border-y border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="What Our Clients Say" 
                subtitle="Reviews" 
            />

            <div x-data="{ 
                active: 0,
                total: {{ count($testimonials) }},
                next() { this.active = (this.active + 1) % this.total },
                prev() { this.active = (this.active - 1 + this.total) % this.total }
            }" class="relative max-w-4xl mx-auto text-center reveal">
                <div class="relative overflow-hidden min-h-[300px] md:min-h-[240px]">
                    @forelse($testimonials as $index => $testimonial)
                        <div x-show="active === {{ $index }}" 
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-x-12"
                             x-transition:enter-end="opacity-100 translate-x-0"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 translate-x-0"
                             x-transition:leave-end="opacity-0 -translate-x-12"
                             class="absolute inset-0 flex flex-col items-center justify-center px-4"
                             x-cloak>
                            <div class="flex text-yellow-400 mb-6">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <blockquote class="text-lg md:text-2xl italic text-text leading-relaxed mb-8 max-w-3xl font-medium" style="font-family: var(--font-body)">
                                "{{ $testimonial->quote }}"
                            </blockquote>
                            <div class="flex items-center gap-4">
                                <img src="{{ $testimonial->avatar ?: 'https://i.pravatar.cc/150?u=' . $testimonial->id }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full border-2 border-primary">
                                <div class="text-left">
                                    <cite class="font-bold text-text not-italic block" style="font-family: var(--font-display)">{{ $testimonial->name }}</cite>
                                    <span class="text-muted text-xs">{{ $testimonial->role }}, {{ $testimonial->company }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted italic text-center">Testimonials coming soon.</p>
                    @endforelse
                </div>

                @if(count($testimonials) > 1)
                <div class="flex justify-center gap-4 mt-10">
                    <button @click="prev()" class="w-10 h-10 rounded-full glass flex items-center justify-center text-text hover:border-primary hover:text-primary transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button @click="next()" class="w-10 h-10 rounded-full glass flex items-center justify-center text-text hover:border-primary hover:text-primary transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- About Teaser --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 relative reveal">
                    <div class="aspect-video glass rounded-3xl p-2 relative overflow-hidden">
                        <img src="https://picsum.photos/seed/about-teaser/800/450" alt="Our Story" class="rounded-2xl shadow-2xl h-full w-full object-cover">
                    </div>
                </div>
                <div class="order-1 md:order-2 reveal">
                    <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Who We Are</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Obsessed With Code, Designed For Humans</h2>
                    <p class="text-muted leading-relaxed mb-8">
                        DARDAA WEB was founded on a singular premise: deliver uncompromising digital greatness. We merge strategic insight with high-fidelity engineering, ensuring every project is an aesthetic masterpiece.
                    </p>
                    <x-button href="{{ route('about') }}" variant="secondary">
                        Discover Our Story
                    </x-button>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="py-24 bg-gradient-to-r from-primary to-secondary relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/5 rounded-full filter blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center reveal">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight" style="font-family: var(--font-display)">
                Ready to Start? <br>Let's Build Something Great.
            </h2>
            <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
                Ready to push boundaries and achieve digital excellence? Let's align your vision with our premium engineering capabilities today.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('quote') }}" class="px-8 py-3.5 bg-white text-primary rounded-full font-bold hover:scale-105 hover:shadow-2xl transition-all">
                    Launch Project Request
                </a>
                <a href="{{ route('contact') }}" class="px-8 py-3.5 bg-transparent border border-white/50 text-white rounded-full font-semibold hover:bg-white/10 hover:scale-105 transition-all">
                    Speak to an Advisor
                </a>
            </div>
        </div>
    </section>
@endsection
