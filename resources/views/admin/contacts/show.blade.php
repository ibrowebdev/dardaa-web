@extends('admin.layouts.app')

@section('title', 'Viewing Contact Inquiry')
@section('page_title', 'Inquiry Details')

@section('content')
<div class="max-w-4xl space-y-6">
    
    {{-- Controls --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Inbox
        </a>
        <div class="flex items-center gap-3">
            <form method="POST" action="{{ route('admin.contacts.markRead', $contact) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="px-4 py-2 border border-border bg-[#1A1A24] hover:bg-white/5 rounded-xl text-sm font-semibold text-white transition">
                    {{ $contact->is_read ? 'Mark Unread' : 'Mark as Read' }}
                </button>
            </form>
            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Permenantly remove this contact record?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-[#FF4D6D] hover:bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-500/10 transition">
                    Delete Inquiry
                </button>
            </form>
        </div>
    </div>

    {{-- Inquiry Body --}}
    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl shadow-xl shadow-black/10 overflow-hidden">
        
        {{-- Header details --}}
        <div class="p-6 sm:p-8 border-b border-border/50 bg-black/10 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Sender</label>
                <p class="text-base font-bold text-white">{{ $contact->name }}</p>
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Email Contact</label>
                <a href="mailto:{{ $contact->email }}" class="text-base font-medium text-primary hover:underline">{{ $contact->email }}</a>
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Timestamp</label>
                <p class="text-sm font-medium text-muted">{{ $contact->created_at->format('F j, Y — g:i A') }}</p>
            </div>
            @if($contact->phone)
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Phone Number</label>
                    <p class="text-sm font-medium text-white">{{ $contact->phone }}</p>
                </div>
            @endif
        </div>

        {{-- Content --}}
        <div class="p-6 sm:p-8 space-y-6">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-2">Subject Line</label>
                <h2 class="text-xl font-extrabold text-white leading-tight">{{ $contact->subject }}</h2>
            </div>

            <div class="pt-6 border-t border-border/50">
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-3">Message Payload</label>
                <div class="bg-[#0D0D14] p-6 rounded-xl border border-border/50 text-text leading-relaxed text-sm sm:text-base whitespace-pre-wrap">{{ $contact->message }}</div>
            </div>
        </div>

        {{-- Action Footer --}}
        <div class="p-6 sm:p-8 bg-black/5 border-t border-border/50 flex justify-end">
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ rawurlencode($contact->subject) }}" class="inline-flex items-center gap-2 px-5 py-3 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-xl shadow-lg shadow-primary/10 tracking-wide uppercase transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Compose Reply Via Email
            </a>
        </div>

    </div>

</div>
@endsection
