@extends('layouts.app')

@section('title', 'About Us — DARDAA WEB')
@section('meta_description', 'Learn our story, vision, core values, and meet the elite team driving digital transformation for global brands.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-20 relative overflow-hidden hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Our Story</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Obsessed with <span class="gradient-text">Innovation</span>
            </h1>
            <nav class="flex items-center justify-center gap-2 text-sm text-muted">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span>/</span>
                <span class="text-text">About Us</span>
            </nav>
        </div>
    </section>

    {{-- Agency Story/Mission --}}
    <section class="py-24 bg-surface/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <h2 class="text-3xl font-bold text-text mb-6" style="font-family: var(--font-display)">Forging Digital Legacies for High-Growth Brands</h2>
                    <div class="space-y-6 text-muted leading-relaxed">
                        <p>
                            Founded in 2018, DARDAA WEB set out to challenge the mediocrity of web solutions. We noticed brands were forced to choose between aesthetic design and strong engineering. We resolved to combine both.
                        </p>
                        <p>
                            Today, we operate as a premium boutique agency based out of Casablanca, serving global clients. We combine rigorous computer science fundamentals with world-class motion design to deliver web applications that drive exponential brand ROI.
                        </p>
                        <p class="text-text font-medium italic border-l-4 border-primary pl-4">
                            "Our mission is single-threaded: Build high-end, bulletproof digital ecosystems that redefine industries."
                        </p>
                    </div>
                </div>
                <div class="relative reveal">
                    <div class="aspect-video glass rounded-3xl p-2 relative overflow-hidden shadow-2xl">
                        <img src="https://picsum.photos/seed/about-story/800/450" alt="Agency Office" class="rounded-2xl h-full w-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Values --}}
    <section class="py-24 bg-surface border-y border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Rooted in Excellence" 
                subtitle="Our Core Values" 
            />

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 reveal-stagger">
                @php
                    $values = [
                        ['title' => 'Radical Integrity', 'desc' => 'Total transparency with clients. No hidden bloat, just direct and highly tactical counsel.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['title' => 'Technical Perfection', 'desc' => 'We despise slow payloads and buggy code. We engineer highly optimized architectures built to last.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                        ['title' => 'Uncompromising Design', 'desc' => 'We refuse standard layouts. We craft custom visual paths that evoke prestige.', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'],
                        ['title' => 'Obsessive Scale', 'desc' => 'Everything we launch is engineered for enterprise load, rapid growth, and massive success.', 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6']
                    ];
                @endphp

                @foreach($values as $value)
                    <div class="bg-surface-light border border-border p-8 rounded-2xl card-hover flex flex-col items-start group">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $value['icon'] }}"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-text mb-3" style="font-family: var(--font-display)">{{ $value['title'] }}</h3>
                        <p class="text-muted text-sm leading-relaxed">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Meet Our Brain Trust" 
                subtitle="The Team" 
            />

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                @forelse($team as $member)
                    <x-team-card :member="$member" />
                @empty
                    <p class="text-muted italic col-span-3 text-center">Team members coming soon.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Awards Section --}}
    <section class="py-24 bg-surface/50 border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Globally Recognized Excellence" 
                subtitle="Awards & Recognition" 
            />

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center reveal-stagger items-center">
                <div class="p-6 glass rounded-2xl border border-border/40">
                    <span class="text-2xl md:text-3xl font-bold text-text block mb-2" style="font-family: var(--font-display)">Awwwards.</span>
                    <span class="text-muted text-xs uppercase tracking-widest">Site of the Day × 4</span>
                </div>
                <div class="p-6 glass rounded-2xl border border-border/40">
                    <span class="text-2xl md:text-3xl font-bold text-text block mb-2" style="font-family: var(--font-display)">CSS Design</span>
                    <span class="text-muted text-xs uppercase tracking-widest">Best UI/UX Design × 6</span>
                </div>
                <div class="p-6 glass rounded-2xl border border-border/40">
                    <span class="text-2xl md:text-3xl font-bold text-text block mb-2" style="font-family: var(--font-display)">Behance</span>
                    <span class="text-muted text-xs uppercase tracking-widest">Featured Web Collection</span>
                </div>
                <div class="p-6 glass rounded-2xl border border-border/40">
                    <span class="text-2xl md:text-3xl font-bold text-text block mb-2" style="font-family: var(--font-display)">FWA</span>
                    <span class="text-muted text-xs uppercase tracking-widest">FWA of the Day × 2</span>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-surface border-t border-border">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Want to Build with Our Elite Team?</h2>
            <p class="text-muted leading-relaxed mb-8">
                We limits our roster to 4 active engagements per quarter to ensure unmatched, undivided expertise. Secure your alignment now.
            </p>
            <div class="flex justify-center gap-4">
                <x-button href="{{ route('contact') }}">Let's Connect</x-button>
                <x-button href="{{ route('quote') }}" variant="secondary">Get Pricing Strategy</x-button>
            </div>
        </div>
    </section>
@endsection
