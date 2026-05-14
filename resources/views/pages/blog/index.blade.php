@extends('layouts.app')

@section('title', 'The Digital Intellect — Blog | DARDAA WEB')
@section('meta_description', 'Insights, tactical guidelines, and deep-dives into high-performance web design, development pipelines, SEO, and modern branding strategies.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-16 relative overflow-hidden hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Insights</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Digital <span class="gradient-text">Intellect</span>
            </h1>
            <nav class="flex items-center justify-center gap-2 text-sm text-muted">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span>/</span>
                <span class="text-text">Blog</span>
            </nav>
        </div>
    </section>

    {{-- Blog Listings --}}
    <section x-data="{ activeCategory: 'All' }" class="py-20 bg-surface/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Category Filters --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12 reveal">
                <button @click="activeCategory = 'All'" 
                        :class="activeCategory === 'All' ? 'bg-primary text-white border-primary' : 'glass border-border text-muted hover:text-text hover:border-primary'"
                        class="px-6 py-2 text-sm font-semibold rounded-full border transition-all duration-300">
                    All Articles
                </button>
                @foreach($categories as $cat)
                    <button @click="activeCategory = '{{ $cat }}'" 
                            :class="activeCategory === '{{ $cat }}' ? 'bg-primary text-white border-primary' : 'glass border-border text-muted hover:text-text hover:border-primary'"
                            class="px-6 py-2 text-sm font-semibold rounded-full border transition-all duration-300">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            {{-- Blog Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                @forelse($posts as $post)
                    <div x-show="activeCategory === 'All' || activeCategory === '{{ $post->category }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="h-full">
                        <x-blog-card :post="$post" />
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-muted italic">Our editorial team is compiling advanced tech dossiers. Check back shortly.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
