@extends('layouts.app')

@section('title', 'Join the Brain Trust — Careers | DARDAA WEB')
@section('meta_description', 'We seek elite designers, engineers, and strategic minds ready to build next-gen computational architectures and branding footprints.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-16 relative overflow-hidden bg-surface border-b border-border hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Recruitment</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Accelerate Your <span class="gradient-text">Evolution</span>
            </h1>
            <p class="text-muted text-lg max-w-xl mx-auto">
                We don't build commodity sites. We build engineering masterpieces. Join an elite enclave of designers and builders.
            </p>
        </div>
    </section>

    {{-- Open Positions Listing --}}
    <section class="py-24 bg-surface/30">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Active Operational Roles" 
                subtitle="We Are Hiring" 
                align="left"
            />

            <div class="space-y-6 mt-12 reveal-stagger">
                @forelse($jobs as $job)
                    <div class="bg-surface border border-border p-8 rounded-3xl card-hover flex flex-col md:flex-row md:items-center justify-between gap-8 group">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 text-[10px] font-black tracking-wider uppercase glass border-primary/30 text-primary rounded-full">
                                    {{ $job->department }}
                                </span>
                                <span class="text-xs font-medium text-muted flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $job->location }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl md:text-2xl font-bold text-text group-hover:text-primary transition-colors" style="font-family: var(--font-display)">
                                {{ $job->title }}
                            </h3>
                            
                            <p class="text-sm text-muted font-medium">
                                Contract Focus: <span class="text-text">{{ $job->type }}</span>
                            </p>
                        </div>

                        <div>
                            <x-button href="{{ route('careers.show', $job->slug) }}" class="shadow-md group-hover:shadow-xl">
                                View Operations Profile
                            </x-button>
                        </div>
                    </div>
                @empty
                    <div class="text-center bg-surface border border-border border-dashed p-12 rounded-3xl">
                        <p class="text-muted italic">Our operational cohorts are currently at maximum optimization capacity. Check back soon.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Culture / Perks Section --}}
    <section class="py-24 border-t border-border bg-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="The Engineering Cult" 
                subtitle="Working at DARDAA WEB" 
            />

            <div class="grid md:grid-cols-3 gap-8 mt-12 reveal-stagger">
                <div class="bg-surface-light border border-border p-8 rounded-2xl card-hover">
                    <div class="text-3xl mb-4">💻</div>
                    <h4 class="text-lg font-bold text-text mb-3" style="font-family: var(--font-display)">Supreme Hardware</h4>
                    <p class="text-muted text-sm">Full M3 Max MacBook Pro configurations, dual premium display alignments, and ergonomic chairs.</p>
                </div>
                <div class="bg-surface-light border border-border p-8 rounded-2xl card-hover">
                    <div class="text-3xl mb-4">🌐</div>
                    <h4 class="text-lg font-bold text-text mb-3" style="font-family: var(--font-display)">Dynamic Locales</h4>
                    <p class="text-muted text-sm">Work completely remote, or utilize our high-rise Casablanca headquarters for dedicated focus.</p>
                </div>
                <div class="bg-surface-light border border-border p-8 rounded-2xl card-hover">
                    <div class="text-3xl mb-4">📈</div>
                    <h4 class="text-lg font-bold text-text mb-3" style="font-family: var(--font-display)">Growth Stipends</h4>
                    <p class="text-muted text-sm">$2,500 yearly operational learning allocations for events, certifications and technical rigs.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
