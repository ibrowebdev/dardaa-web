@extends('layouts.app')

@section('title', $project->title . ' — Case Study | DARDAA WEB')
@section('meta_description', Str::limit(strip_tags($project->description), 150))

@section('content')
    {{-- Project Hero --}}
    <section class="pt-32 pb-16 relative overflow-hidden bg-surface border-b border-border hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center animate-fade-in-up mb-12">
                <span class="px-4 py-1 text-xs font-bold tracking-widest uppercase rounded-full glass border-primary/30 text-primary mb-4 inline-block">
                    {{ $project->category }}
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                    {{ $project->title }}
                </h1>
                <p class="text-muted text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                    {{ $project->description }}
                </p>
            </div>
            
            {{-- Main Showcase Image --}}
            <div class="relative aspect-[21/9] rounded-3xl overflow-hidden border-4 border-white/5 shadow-2xl max-w-6xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                <img src="{{ $project->image ?: 'https://picsum.photos/seed/' . $project->id . '/1200/600' }}" 
                     alt="{{ $project->title }}" 
                     class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    {{-- Project Stats / Specs --}}
    <section class="py-12 border-b border-border bg-surface-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center border-r border-border last:border-r-0">
                    <span class="text-xs uppercase tracking-widest text-muted block mb-1">Client</span>
                    <span class="text-lg font-bold text-text" style="font-family: var(--font-display)">{{ $project->client ?: 'Confidential' }}</span>
                </div>
                <div class="text-center border-r border-border last:border-r-0">
                    <span class="text-xs uppercase tracking-widest text-muted block mb-1">Category</span>
                    <span class="text-lg font-bold text-primary" style="font-family: var(--font-display)">{{ $project->category }}</span>
                </div>
                <div class="text-center border-r border-border last:border-r-0">
                    <span class="text-xs uppercase tracking-widest text-muted block mb-1">Status</span>
                    <span class="text-lg font-bold text-green-400" style="font-family: var(--font-display)">Live</span>
                </div>
                <div class="text-center last:border-r-0">
                    <span class="text-xs uppercase tracking-widest text-muted block mb-1">Release</span>
                    <span class="text-lg font-bold text-text" style="font-family: var(--font-display)">{{ $project->created_at->format('Y') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Case Study Content --}}
    <section class="py-20 bg-surface/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-16">
                {{-- Longform Study Content --}}
                <div class="lg:col-span-8 reveal">
                    <div class="prose-dark">
                        @if($project->body)
                            {!! $project->body !!}
                        @else
                            <h2>Case Study Architecture</h2>
                            <p>Our detailed case analysis for {{ $project->title }} evaluates the system architecture, user interface requirements, and growth optimization protocols delivered.</p>
                            <h3>The Opportunity</h3>
                            <p>The client demanded a premium technological upgrade to match their expanding global footprint and establish modern visual prestige.</p>
                            <h3>Our Approach</h3>
                            <p>We mapped operational blueprints in a dedicated workshop, followed by high-fidelity interactive prototype building, rigorous engineering in Laravel, and hard deployment audits.</p>
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-4 space-y-8 reveal">
                    <div class="bg-surface border border-border p-8 rounded-2xl shadow-lg relative">
                        <h3 class="text-xl font-bold text-text mb-6" style="font-family: var(--font-display)">Ready to Launch?</h3>
                        <p class="text-muted text-sm leading-relaxed mb-6">
                            Impressed by {{ $project->client ?: 'this project' }}'s evolutionary success? We'd love to discuss mapping your digital expansion path.
                        </p>
                        @if($project->url)
                            <a href="{{ $project->url }}" target="_blank" class="btn-primary w-full justify-center mb-4">
                                Launch Live Website
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @endif
                        <x-button href="{{ route('quote') }}" variant="secondary" class="w-full justify-center">
                            Schedule Alignment Call
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Work --}}
    @if(count($relatedProjects) > 0)
    <section class="py-24 bg-surface border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Related Architecture" 
                subtitle="Explore More" 
                align="left"
            />

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger mt-12">
                @foreach($relatedProjects as $rel)
                    <x-project-card :project="$rel" />
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
