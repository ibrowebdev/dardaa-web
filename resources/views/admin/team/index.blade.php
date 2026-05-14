@extends('admin.layouts.app')

@section('title', 'Team Manifest')
@section('page_title', 'Team Manifest')

@section('content')
<div class="space-y-8">
    
    {{-- Action Header --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <form action="{{ route('admin.team.index') }}" method="GET" class="relative flex-1 max-w-md w-full">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search members by name or role..." 
                   class="w-full bg-[#1A1A24] text-sm text-white placeholder-muted px-4 py-2.5 pl-11 rounded-xl border border-border outline-none focus:border-primary transition">
            <svg class="w-4.5 h-4.5 text-muted absolute left-4 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
        <a href="{{ route('admin.team.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-xl shadow-lg shadow-primary/15 tracking-wide transition shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Member
        </a>
    </div>

    {{-- Elegant Profile Cards Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($team as $member)
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden relative group shadow-xl">
                
                {{-- Photo Box --}}
                <div class="w-full aspect-square overflow-hidden relative bg-black">
                    @if($member->photo)
                        <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transition group-hover:scale-105 duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-muted uppercase bg-[#0D0D14] text-3xl font-black">{{ substr($member->name, 0, 1) }}</div>
                    @endif

                    {{-- Action Hover Overlay --}}
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-250 flex items-center justify-center gap-3">
                        <a href="{{ route('admin.team.edit', $member) }}" class="p-2.5 bg-white/10 backdrop-blur hover:bg-primary hover:text-white text-white rounded-xl border border-white/10 transition" title="Edit Member Profile">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.team.destroy', $member) }}" onsubmit="return confirm('Are you sure you want to remove this member from the agency listing?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2.5 bg-[#FF4D6D]/10 backdrop-blur hover:bg-[#FF4D6D] text-[#FF4D6D] hover:text-white border border-[#FF4D6D]/20 rounded-xl transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Stats details --}}
                <div class="p-5 text-center space-y-2 bg-[#1A1A24]">
                    <h3 class="font-extrabold text-base text-white truncate">{{ $member->name }}</h3>
                    <p class="text-xs font-semibold text-primary tracking-wider uppercase">{{ $member->role }}</p>
                    
                    {{-- Link socials --}}
                    @if($member->linkedin || $member->twitter)
                        <div class="flex items-center justify-center gap-3 pt-2 border-t border-border/50 mt-3">
                            @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank" class="text-muted hover:text-white transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            @endif
                            @if($member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank" class="text-muted hover:text-white transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full bg-[#1A1A24] border border-dashed border-border/50 rounded-2xl py-20 text-center text-muted font-medium">No team members configured yet. Introduce your talent!</div>
        @endforelse
    </div>

    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl px-6 py-4">
        {{ $team->links() }}
    </div>
</div>
@endsection
