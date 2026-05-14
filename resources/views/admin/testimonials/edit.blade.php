@extends('admin.layouts.app')

@section('title', 'Refine Testimonial')
@section('page_title', 'Refine Client Endorsement')

@section('content')
<div class="max-w-4xl">
    
    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Reviews
    </a>

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')

        {{-- Left side: Avatar & Rating --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl text-center space-y-4">
                <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Client Image</h3>
                
                <div x-data="{ photoPreview: '{{ $testimonial->avatar ? asset($testimonial->avatar) : '' }}' }" class="space-y-4">
                    <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*"
                           x-ref="photo"
                           x-on:change="
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                           ">
                    
                    <div class="w-32 h-32 rounded-full border-2 border-dashed border-border hover:border-primary bg-[#0D0D14] mx-auto relative cursor-pointer overflow-hidden flex items-center justify-center transition group"
                         x-on:click.prevent="$refs.photo.click()">
                        
                        <template x-if="!photoPreview">
                            <div class="text-center p-4">
                                <svg class="w-6 h-6 text-muted mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <span class="block text-[10px] font-bold text-muted">Upload</span>
                            </div>
                        </template>

                        <template x-if="photoPreview">
                            <div class="relative w-full h-full group">
                                <img :src="photoPreview" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-200">
                                    <span class="text-white text-[10px] font-bold tracking-widest bg-primary px-2 py-1 rounded uppercase">Swap</span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <p class="text-[10px] text-muted/60">Change the active client profile photo.</p>
            </div>

            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-4" x-data="{ rating: {{ old('rating', $testimonial->rating) }} }">
                <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Performance Rating</h3>
                
                <div class="flex justify-center items-center gap-2">
                    <input type="hidden" name="rating" x-model="rating">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" @click="rating = {{ $i }}" class="transition hover:scale-110 active:scale-95 cursor-pointer">
                            <svg class="w-8 h-8" :class="rating >= {{ $i }} ? 'text-[#FFC107] fill-[#FFC107]' : 'text-muted/30'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        </button>
                    @endfor
                </div>
            </div>
        </div>

        {{-- Right side: Primary Inputs --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Reviewer Name *</label>
                        <input type="text" name="name" id="name" required value="{{ old('name', $testimonial->name) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="company" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Company Brand *</label>
                        <input type="text" name="company" id="company" required value="{{ old('company', $testimonial->company) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="role" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Client Role / Title</label>
                    <input type="text" name="role" id="role" value="{{ old('role', $testimonial->role) }}" placeholder="e.g. Technical Founder, CTO"
                           class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                </div>

                <div>
                    <label for="quote" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Testimonial Quote Transcript *</label>
                    <textarea name="quote" id="quote" required rows="5"
                              class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm font-medium resize-none italic leading-relaxed">{{ old('quote', $testimonial->quote) }}</textarea>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-8 py-4 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-2xl tracking-wider uppercase shadow-lg shadow-primary/10 transition-all">
                    Save Modification Block
                </button>
            </div>
        </div>

    </form>

</div>
@endsection
