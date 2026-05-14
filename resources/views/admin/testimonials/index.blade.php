@extends('admin.layouts.app')

@section('title', 'Client Endorsements')
@section('page_title', 'Client Testimonials')

@section('content')
<div class="space-y-6">
    
    {{-- Controls Header --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <form action="{{ route('admin.testimonials.index') }}" method="GET" class="relative flex-1 max-w-md w-full">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search by reviewer name or brand..." 
                   class="w-full bg-[#1A1A24] text-sm text-white placeholder-muted px-4 py-2.5 pl-11 rounded-xl border border-border outline-none focus:border-primary transition">
            <svg class="w-4.5 h-4.5 text-muted absolute left-4 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-xl shadow-lg shadow-primary/15 tracking-wide transition shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Record Testimonial
        </a>
    </div>

    {{-- Grid cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($testimonials as $testimonial)
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl shadow-black/5 flex flex-col justify-between relative group">
                
                <div class="absolute top-6 right-6 flex gap-1">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-[#FFC107]' : 'text-muted/30' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>

                <div class="space-y-4 pt-2">
                    {{-- Quotation mark overlay background --}}
                    <div class="text-5xl text-primary/10 font-serif select-none leading-[0]">“</div>
                    <p class="text-sm text-text leading-relaxed font-medium italic">“{{ $testimonial->quote }}”</p>
                </div>

                <div class="mt-6 pt-5 border-t border-border/50 flex items-center justify-between">
                    <div class="flex items-center gap-3 min-w-0">
                        @if($testimonial->avatar)
                            <img src="{{ asset($testimonial->avatar) }}" alt="" class="w-10 h-10 rounded-full object-cover border border-border">
                        @else
                            <div class="w-10 h-10 rounded-full bg-[#0D0D14] border border-border flex items-center justify-center text-xs font-bold text-muted uppercase">{{ substr($testimonial->name, 0, 1) }}</div>
                        @endif
                        <div class="flex flex-col min-w-0">
                            <span class="text-sm font-bold text-white truncate">{{ $testimonial->name }}</span>
                            <span class="text-[11px] text-muted truncate font-medium">{{ $testimonial->role ? $testimonial->role . ', ' : '' }}{{ $testimonial->company }}</span>
                        </div>
                    </div>

                    <div class="flex gap-2 shrink-0">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 bg-white/5 hover:bg-primary border border-border hover:border-primary hover:text-white text-muted rounded-lg transition" title="Edit Frame">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Do you want to purge this testimonial asset?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-[#FF4D6D]/5 hover:bg-[#FF4D6D] border border-[#FF4D6D]/20 hover:text-white text-[#FF4D6D] rounded-lg transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-[#1A1A24] border border-dashed border-border/50 rounded-2xl py-20 text-center text-muted font-medium">No active client quotes stored yet. Start capturing social proof!</div>
        @endforelse
    </div>

    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl px-6 py-4">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
