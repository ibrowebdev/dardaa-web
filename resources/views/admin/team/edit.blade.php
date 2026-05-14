@extends('admin.layouts.app')

@section('title', 'Modify Profile')
@section('page_title', 'Modify Talent Profile')

@section('content')
<div class="max-w-4xl">
    
    <a href="{{ route('admin.team.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Manifest
    </a>

    <form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')

        {{-- Avatar Preview Column --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl text-center space-y-4">
                <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Talent Photo</h3>
                
                <div x-data="{ photoPreview: '{{ $member->photo ? asset($member->photo) : '' }}' }" class="space-y-4">
                    <input type="file" name="photo" id="photo" class="hidden" accept="image/*"
                           x-ref="photo"
                           x-on:change="
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                           ">
                    
                    <div class="w-40 h-40 rounded-full border-2 border-dashed border-border hover:border-primary bg-[#0D0D14] mx-auto relative cursor-pointer overflow-hidden flex items-center justify-center transition group"
                         x-on:click.prevent="$refs.photo.click()">
                        
                        <template x-if="!photoPreview">
                            <div class="text-center p-4">
                                <svg class="w-6 h-6 text-muted mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                <span class="block text-[10px] font-bold text-muted">Upload Photo</span>
                            </div>
                        </template>

                        <template x-if="photoPreview">
                            <div class="relative w-full h-full group">
                                <img :src="photoPreview" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                                    <span class="text-white font-bold text-[10px] uppercase tracking-wider bg-primary px-2 py-1 rounded">Swap</span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <p class="text-[10px] text-muted/60 leading-relaxed">Select a new file to override the active profile headshot.</p>
            </div>
        </div>

        {{-- Properties Form Column --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Full Display Name *</label>
                        <input type="text" name="name" id="name" required value="{{ old('name', $member->name) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="role" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Agency Role Title *</label>
                        <input type="text" name="role" id="role" required value="{{ old('role', $member->role) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Mini Narrative Biography</label>
                    <textarea name="bio" id="bio" rows="4" placeholder="Bio overview..."
                              class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none">{{ old('bio', $member->bio) }}</textarea>
                </div>

                <div class="border-t border-border/50 pt-6 space-y-4">
                    <h4 class="font-bold text-xs text-muted uppercase tracking-widest">Social Handles</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="linkedin" class="block text-[10px] font-bold text-muted uppercase mb-2">LinkedIn Profile URL</label>
                            <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $member->linkedin) }}" placeholder="https://linkedin.com/in/username"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div>
                            <label for="twitter" class="block text-[10px] font-bold text-muted uppercase mb-2">Twitter / X URL</label>
                            <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $member->twitter) }}" placeholder="https://x.com/username"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-8 py-4 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-2xl tracking-wider uppercase shadow-lg shadow-primary/10 transition-all">
                    Save Modifications
                </button>
            </div>
        </div>

    </form>

</div>
@endsection
