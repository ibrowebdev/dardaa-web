@extends('layouts.app')

@section('title', '404 — Coordinate Lost | DARDAA WEB')

@section('content')
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden hero-gradient">
        <div class="max-w-xl mx-auto px-4 text-center z-10 animate-fade-in-up">
            
            <div class="text-[150px] md:text-[200px] font-black text-surface-light leading-none selection:bg-transparent relative" 
                 style="font-family: var(--font-display)">
                404
                <div class="absolute inset-0 bg-gradient-to-t from-transparent to-primary/10 mix-blend-overlay"></div>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-text mt-[-20px] mb-6" style="font-family: var(--font-display)">
                Coordinate <span class="gradient-text">De-synchronized</span>
            </h1>
            
            <p class="text-muted mb-10 text-sm leading-relaxed max-w-md mx-auto">
                The route requested does not align with any active operational nodes inside the DARDAA WEB mainframe architecture.
            </p>

            <div class="flex justify-center">
                <x-button href="{{ route('home') }}">
                    Return to Base
                </x-button>
            </div>

        </div>
    </section>
@endsection
