@extends('layouts.app')

@section('title', $post->title . ' — DARDAA WEB')
@section('meta_description', Str::limit(strip_tags($post->excerpt), 150))

@section('content')
    {{-- Blog Header Hero --}}
    <section class="pt-32 pb-16 bg-surface relative border-b border-border hero-gradient">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="animate-fade-in-up">
                <span class="px-4 py-1 text-xs font-bold tracking-widest uppercase rounded-full glass border-primary/30 text-primary mb-6 inline-block">
                    {{ $post->category }}
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight text-text mb-8" style="font-family: var(--font-display)">
                    {{ $post->title }}
                </h1>
                
                <div class="flex items-center justify-center gap-6 text-sm text-muted border-t border-b border-border/50 py-4 mb-10">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary text-xs font-bold">
                            {{ substr($post->author, 0, 1) }}
                        </div>
                        <span class="text-text font-medium">By {{ $post->author }}</span>
                    </div>
                    <span>•</span>
                    <span>{{ $post->published_at ? $post->published_at->format('F d, Y') : 'Draft' }}</span>
                    <span>•</span>
                    <span>{{ $post->read_time }} min read</span>
                </div>
            </div>

            {{-- Thumbnail --}}
            <div class="relative aspect-[2/1] rounded-3xl overflow-hidden shadow-2xl animate-fade-in-up" style="animation-delay: 0.2s;">
                <img src="{{ $post->thumbnail ?: 'https://picsum.photos/seed/' . $post->id . '/1200/600' }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    {{-- Article Body --}}
    <section class="py-20 bg-surface/30">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <article class="prose-dark">
                    {!! $post->body !!}
                </article>

                {{-- Author Bio Block --}}
                <div class="mt-16 bg-surface border border-border p-8 rounded-2xl flex flex-col sm:flex-row items-center sm:items-start gap-6">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center font-bold text-white text-2xl shrink-0 shadow-lg" style="font-family: var(--font-display)">
                        {{ substr($post->author, 0, 1) }}
                    </div>
                    <div class="text-center sm:text-left">
                        <h3 class="text-xl font-bold text-text mb-2" style="font-family: var(--font-display)">{{ $post->author }}</h3>
                        <span class="text-primary text-sm font-medium block mb-3">Editorial Board at DARDAA WEB</span>
                        <p class="text-muted text-sm leading-relaxed">
                            Meticulously exploring the intersection of modern computational engineering, high-end visual architectures, and strategic market economics.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Posts --}}
    @if(count($relatedPosts) > 0)
    <section class="py-24 bg-surface border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Continue Reading" 
                subtitle="Related Dossiers" 
                align="left"
            />

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12 reveal-stagger">
                @foreach($relatedPosts as $rel)
                    <x-blog-card :post="$rel" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Response Section --}}
    <section class="py-20 bg-gradient-to-r from-surface-light to-surface border-t border-border">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="text-2xl md:text-3xl font-bold text-text mb-4" style="font-family: var(--font-display)">Have Perspectives on This?</h2>
            <p class="text-muted text-sm leading-relaxed mb-8 max-w-lg mx-auto">
                Let's discuss deploying these tactics directly inside your business framework. Speak directly with our core architect board.
            </p>
            <x-button href="{{ route('contact') }}">Initiate Strategy Call</x-button>
        </div>
    </section>
@endsection
