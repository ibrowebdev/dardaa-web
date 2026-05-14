@extends('layouts.app')

@section('title', $job->title . ' — Active Operations | DARDAA WEB')
@section('meta_description', 'Apply to join DARDAA WEB as a ' . $job->title . '. Evaluate full technical scopes and operational deliverables.')

@section('content')
    {{-- Job Page Header --}}
    <section class="pt-32 pb-12 relative overflow-hidden bg-surface border-b border-border hero-gradient">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 animate-fade-in-up">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="px-3 py-1 text-xs font-bold tracking-widest uppercase rounded-full glass border-primary/30 text-primary">
                    {{ $job->department }}
                </span>
                <span class="text-xs text-muted uppercase tracking-widest font-bold">
                    {{ $job->location }}
                </span>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight text-text mb-4" style="font-family: var(--font-display)">
                {{ $job->title }}
            </h1>
            <p class="text-muted font-medium text-sm">
                Engagement Vector: <span class="text-text font-bold">{{ $job->type }}</span>
            </p>
        </div>
    </section>

    {{-- Content Split Grid --}}
    <section class="py-20 bg-surface/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-16">
                
                {{-- Details --}}
                <div class="lg:col-span-7 reveal">
                    <div class="bg-surface border border-border p-8 md:p-10 rounded-3xl shadow-xl">
                        <div class="prose-dark">
                            {!! $job->description !!}
                        </div>
                    </div>
                </div>

                {{-- Form Rig --}}
                <div class="lg:col-span-5 reveal">
                    <div id="apply-now" class="bg-surface border border-border p-8 md:p-10 rounded-3xl shadow-2xl relative sticky top-24">
                        <h2 class="text-2xl font-bold text-text mb-6" style="font-family: var(--font-display)">Transmission Application</h2>

                        @if(session('success'))
                            <x-alert type="success" message="{{ session('success') }}" />
                        @endif

                        @if ($errors->any())
                            <div class="glass border-red-500/30 p-4 rounded-xl mb-6">
                                <ul class="list-disc list-inside text-xs text-red-400 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('careers.apply', $job->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf

                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Full Name *</label>
                                <input type="text" name="name" id="name" class="form-input" placeholder="Arthur C. Clarke" required value="{{ old('name') }}">
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Secure Email *</label>
                                <input type="email" name="email" id="email" class="form-input" placeholder="arthur@visionary.com" required value="{{ old('email') }}">
                            </div>

                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-input" placeholder="+212..." value="{{ old('phone') }}">
                            </div>

                            <div>
                                <label for="cover_letter" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Operational Drive / Cover Letter *</label>
                                <textarea name="cover_letter" id="cover_letter" rows="4" class="form-input resize-none text-sm" placeholder="Briefly map why your experience perfectly aligns with DARDAA WEB... (Min 50 chars)" required>{{ old('cover_letter') }}</textarea>
                            </div>

                            <div>
                                <label for="cv" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">PDF Resume / Dossier *</label>
                                <input type="file" name="cv" id="cv" class="form-input !py-2 text-xs" accept=".pdf,.doc,.docx" required>
                                <span class="text-[10px] text-muted block mt-1">Acceptable formats: PDF, DOCX. Max footprint: 5MB.</span>
                            </div>

                            <button type="submit" class="btn-primary w-full justify-center !py-4">
                                Submit Operations Bid
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
