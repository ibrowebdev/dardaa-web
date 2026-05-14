@extends('layouts.app')

@section('title', 'Launch Success — Alignment Rig | DARDAA WEB')
@section('meta_description', 'Alignment request initialized. Check the next operational steps for the agency engagement.')

@section('content')
    <section class="min-h-screen flex items-center justify-center pt-24 pb-16 relative overflow-hidden hero-gradient">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            
            {{-- Glow Ring Check --}}
            <div class="w-24 h-24 rounded-full bg-green-500/10 border-2 border-green-500/40 text-green-400 flex items-center justify-center mx-auto mb-8 shadow-[0_0_30px_rgba(34,197,94,0.2)] animate-pulse-glow">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-text mb-6" style="font-family: var(--font-display)">
                Transmission <span class="text-green-400">Locked</span>
            </h1>
            
            <p class="text-muted text-lg mb-10 leading-relaxed">
                Your structural alignment parameters have been securely written to our assessment queue. The core architects have been alerted.
            </p>

            <div class="bg-surface border border-border rounded-2xl p-8 mb-10 text-left space-y-6 shadow-2xl">
                <h3 class="text-sm font-bold uppercase tracking-widest text-text border-b border-border pb-3" style="font-family: var(--font-display)">Next Operational Epochs</h3>
                
                <div class="flex gap-4">
                    <div class="w-6 h-6 rounded-full bg-primary/20 text-primary text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</div>
                    <p class="text-sm text-muted"><strong class="text-text">Rigorous Audit:</strong> Architect board reviews structural requirements, constraints, and objectives.</p>
                </div>
                <div class="flex gap-4">
                    <div class="w-6 h-6 rounded-full bg-primary/20 text-primary text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</div>
                    <p class="text-sm text-muted"><strong class="text-text">Direct Reach:</strong> Senior strategist initiates secure scheduling to map the primary discovery workshop.</p>
                </div>
                <div class="flex gap-4">
                    <div class="w-6 h-6 rounded-full bg-primary/20 text-primary text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</div>
                    <p class="text-sm text-muted"><strong class="text-text">Proposal Rig:</strong> We construct the full execution strategy and budget settlement blueprint.</p>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                <x-button href="{{ route('home') }}">
                    Return to Command
                </x-button>
                <x-button href="{{ route('portfolio') }}" variant="secondary">
                    Browse Masterpieces
                </x-button>
            </div>

        </div>
    </section>
@endsection
