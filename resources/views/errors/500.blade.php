@extends('layouts.app')

@section('title', '500 — Core Incident | DARDAA WEB')

@section('content')
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden hero-gradient">
        <div class="max-w-xl mx-auto px-4 text-center z-10 animate-fade-in-up">
            
            <div class="text-[150px] md:text-[200px] font-black text-surface-light leading-none selection:bg-transparent relative" 
                 style="font-family: var(--font-display)">
                500
                <div class="absolute inset-0 bg-gradient-to-t from-transparent to-red-500/10 mix-blend-overlay"></div>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-text mt-[-20px] mb-6" style="font-family: var(--font-display)">
                Core Server <span class="text-red-400">Critical</span>
            </h1>
            
            <p class="text-muted mb-10 text-sm leading-relaxed max-w-md mx-auto">
                The operational mainframe sustained a structural error while loading the requested dataset. The engineering crew has been notified.
            </p>

            <div class="flex justify-center">
                <x-button href="{{ route('home') }}">
                    Return to Mainframe
                </x-button>
            </div>

        </div>
    </section>
@endsection
