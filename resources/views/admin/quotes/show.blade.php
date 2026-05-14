@extends('admin.layouts.app')

@section('title', 'Quote Inquiry Detail')
@section('page_title', 'Project Estimate In-depth')

@section('content')
<div class="max-w-5xl space-y-6">
    
    {{-- Header controls --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.quotes.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Quotes
        </a>
        <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" onsubmit="return confirm('Permanently discard this client quote estimate request?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-[#FF4D6D] hover:bg-red-600 text-white rounded-xl text-sm font-bold tracking-wide transition shadow-lg shadow-red-500/10">Delete Estimate</button>
        </form>
    </div>

    {{-- Card Structure --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- Left Side: Client Summary --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl shadow-black/5 space-y-5">
                <h3 class="text-xs font-bold uppercase tracking-widest text-muted border-b border-border/50 pb-3">Client Identity</h3>
                
                <div>
                    <label class="block text-[10px] uppercase tracking-wider text-muted mb-0.5">Primary Contact</label>
                    <p class="text-base font-extrabold text-white">{{ $quote->name }}</p>
                </div>
                <div>
                    <label class="block text-[10px] uppercase tracking-wider text-muted mb-0.5">Email Address</label>
                    <a href="mailto:{{ $quote->email }}" class="text-sm font-medium text-primary hover:underline break-all">{{ $quote->email }}</a>
                </div>
                @if($quote->company)
                    <div>
                        <label class="block text-[10px] uppercase tracking-wider text-muted mb-0.5">Company / Agency</label>
                        <p class="text-sm font-medium text-white">{{ $quote->company }}</p>
                    </div>
                @endif
                <div>
                    <label class="block text-[10px] uppercase tracking-wider text-muted mb-0.5">Creation Timestamp</label>
                    <p class="text-xs text-muted font-medium">{{ $quote->created_at->format('M d, Y @ g:i A') }}</p>
                </div>
            </div>

            {{-- Fast Action Box --}}
            <a href="mailto:{{ $quote->email }}?subject=Regarding your Project Inquiry with DARDAA WEB" class="w-full bg-primary hover:bg-primary-dark text-white text-center py-4 rounded-2xl font-bold tracking-wide uppercase shadow-lg shadow-primary/10 transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Follow Up via Email
            </a>
        </div>

        {{-- Right Side: Project Scope --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Services & Numbers --}}
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-xl shadow-black/5">
                <div class="p-6 bg-black/10 border-b border-border/50">
                    <h3 class="font-bold text-white text-sm">Project Scope & Parameters</h3>
                </div>
                
                <div class="p-6 sm:p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-3">Requested Deliverables</label>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $services = is_array($quote->services) ? $quote->services : (json_decode($quote->services, true) ?: []);
                            @endphp
                            @forelse($services as $service)
                                <span class="px-3 py-1.5 rounded-lg bg-white/5 border border-border text-xs font-bold text-white tracking-wide">{{ $service }}</span>
                            @empty
                                <span class="text-xs text-muted italic">No services selected.</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Budget Range</label>
                            <span class="text-2xl font-extrabold text-[#00C896] tracking-tight">{{ $quote->budget }}</span>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Timeline Threshold</label>
                            <span class="text-base font-bold text-white tracking-wide">{{ $quote->timeline }}</span>
                        </div>
                    </div>
                </div>

                {{-- Description details --}}
                @if($quote->description)
                    <div class="p-6 sm:p-8 border-t border-border/50 space-y-3 bg-[#0D0D14]/50">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-muted">Detailed Requirements</label>
                        <div class="bg-[#0D0D14] p-6 rounded-xl border border-border/50 text-text leading-relaxed text-sm sm:text-base whitespace-pre-wrap">{{ $quote->description }}</div>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>
@endsection
