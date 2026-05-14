@extends('layouts.app')

@section('title', 'Our Portfolio — DARDAA WEB')
@section('meta_description', 'Browse our latest web design and development masterpieces. Real case studies demonstrating elite digital ROI.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-16 relative overflow-hidden hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Showcase</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Engineering <span class="gradient-text">Triumphs</span>
            </h1>
            <nav class="flex items-center justify-center gap-2 text-sm text-muted">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span>/</span>
                <span class="text-text">Portfolio</span>
            </nav>
        </div>
    </section>

    {{-- Filterable Portfolio Grid --}}
    <section x-data="{ activeCategory: 'All' }" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Category Filters --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12 reveal">
                <button @click="activeCategory = 'All'" 
                        :class="activeCategory === 'All' ? 'bg-primary text-white border-primary' : 'glass border-border text-muted hover:text-text hover:border-primary'"
                        class="px-6 py-2 text-sm font-semibold rounded-full border transition-all duration-300">
                    All Work
                </button>
                @foreach($categories as $category)
                    <button @click="activeCategory = '{{ $category }}'" 
                            :class="activeCategory === '{{ $category }}' ? 'bg-primary text-white border-primary' : 'glass border-border text-muted hover:text-text hover:border-primary'"
                            class="px-6 py-2 text-sm font-semibold rounded-full border transition-all duration-300">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            {{-- Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                @forelse($projects as $project)
                    <div x-show="activeCategory === 'All' || activeCategory === '{{ $project->category }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="h-full">
                        <x-project-card :project="$project" />
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-muted italic">Our portfolio projects are being meticulously loaded. Check back shortly.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Bottom CTA Banner --}}
    <section class="py-24 bg-surface border-t border-border relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-text mb-6" style="font-family: var(--font-display)">Impressed by Our Architectural Polishing?</h2>
            <p class="text-muted leading-relaxed mb-8">
                Let's collaborate to engineer your brand's next evolutionary digital step. We construct systems that deliver.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <x-button href="{{ route('quote') }}">Initiate Digital Launch</x-button>
            </div>
        </div>
    </section>
@endsection
