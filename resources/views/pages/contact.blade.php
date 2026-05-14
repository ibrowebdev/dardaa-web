@extends('layouts.app')

@section('title', 'Initiate Alignment — Contact Us | DARDAA WEB')
@section('meta_description', 'Speak directly with our core architects. Secure your digital alignment consultation today.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-16 relative overflow-hidden bg-surface border-b border-border hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Connection</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Initiate <span class="gradient-text">Alignment</span>
            </h1>
            <p class="text-muted text-lg max-w-xl mx-auto">
                We review incoming inquiries within 24 hours to ensure high-speed alignment pipelines. Let's map your path.
            </p>
        </div>
    </section>

    {{-- Main Form Grid --}}
    <section class="py-24 bg-surface/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-16 items-start">
                
                {{-- Contact Form --}}
                <div class="lg:col-span-7 reveal bg-surface border border-border p-8 md:p-10 rounded-3xl shadow-2xl">
                    <h2 class="text-2xl font-bold text-text mb-8" style="font-family: var(--font-display)">Transmission Portal</h2>

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

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        {{-- Honeypot --}}
                        <div class="hidden">
                            <input type="text" name="honeypot" id="honeypot" value="">
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Full Identity *</label>
                                <input type="text" name="name" id="name" class="form-input" placeholder="Ex: Sarah Mitchell" value="{{ old('name') }}" required>
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Secure Email *</label>
                                <input type="email" name="email" id="email" class="form-input" placeholder="sarah@enterprise.com" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Phone Contact</label>
                                <input type="text" name="phone" id="phone" class="form-input" placeholder="+212 6..." value="{{ old('phone') }}">
                            </div>
                            <div>
                                <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Subject Focus *</label>
                                <select name="subject" id="subject" class="form-input bg-surface select-dark" required>
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select engagement focus...</option>
                                    <option value="Project Request" {{ old('subject') === 'Project Request' ? 'selected' : '' }}>Project Request (Launch & Design)</option>
                                    <option value="General Enquiry" {{ old('subject') === 'General Enquiry' ? 'selected' : '' }}>General Business Enquiry</option>
                                    <option value="Partnership" {{ old('subject') === 'Partnership' ? 'selected' : '' }}>Strategic Partnership</option>
                                    <option value="Support" {{ old('subject') === 'Support' ? 'selected' : '' }}>Active Client Support</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Transmission Scope *</label>
                            <textarea name="message" id="message" rows="6" class="form-input resize-none" placeholder="Outline operational challenges, project metrics, and expectations... (Min 20 chars)" required>{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center !py-4">
                            Initialize Secure Transmission
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>

                {{-- Info Column --}}
                <div class="lg:col-span-5 reveal space-y-10">
                    <div>
                        <h3 class="text-xl font-bold text-text mb-6" style="font-family: var(--font-display)">Headquarters Coordinates</h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4 bg-surface border border-border p-5 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-muted uppercase tracking-widest mb-1">Address</span>
                                    <span class="text-sm text-text">Wuse Abuja<br>FCT, Nigeria</span>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 bg-surface border border-border p-5 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-muted uppercase tracking-widest mb-1">Email Address</span>
                                    <a href="mailto:{{config('mail.from.address')}}" class="text-sm text-text hover:text-primary transition-colors">{{config('mail.from.address')}}</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 bg-surface border border-border p-5 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-muted uppercase tracking-widest mb-1">Phone Number</span>
                                    <a href="tel:+2348102554864" class="text-sm text-text hover:text-primary transition-colors">+2348102554864</a>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 bg-surface border border-border p-5 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-muted uppercase tracking-widest mb-1">Whatsapp</span>
                                    <a href="tel:+2347012953657" class="text-sm text-text hover:text-primary transition-colors">+2347012953657</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 bg-surface border border-border p-5 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-muted uppercase tracking-widest mb-1">Operational Hours</span>
                                    <span class="text-sm text-text">Monday - Friday | 09:00 AM - 18:00 PM (GMT+1)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Static Map Placeholder --}}
                    <div class="relative rounded-3xl overflow-hidden aspect-[16/9] border border-border shadow-lg">
                        {{-- Dark Mode styled map --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.8464441046146!2d-7.632454224086639!3d33.58336214298074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d29d55555555%3A0x7c655b200000000!2sTwin%20Center!5e0!3m2!1sen!2sma!4v1715678987654!5m2!1sen!2sma" 
                                class="absolute inset-0 w-full h-full border-0 grayscale contrast-125 opacity-70 hover:opacity-100 transition-opacity duration-500" 
                                allowfullscreen="" 
                                loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
