@extends('admin.layouts.app')

@section('title', 'Add Member')
@section('page_title', 'Introduce New Talent')

@section('content')
<div class="max-w-4xl">
    
    <a href="{{ route('admin.team.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Manifest
    </a>

    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf

        {{-- Photo Upload Left --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl text-center space-y-4">
                <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Talent Photo</h3>
                
                <div x-data="{ photoPreview: null }" class="space-y-4">
                    <input type="file" name="photo" id="photo" class="hidden" accept="image/*" required
                           x-ref="photo"
                           x-on:change="
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                           ">
                    
                    {{-- Rounded Avatar Preview --}}
                    <div class="w-40 h-40 rounded-full border-2 border-dashed border-border hover:border-primary bg-[#0D0D14] mx-auto relative cursor-pointer overflow-hidden flex items-center justify-center transition group"
                         x-on:click.prevent="$refs.photo.click()">
                        
                        <template x-if="!photoPreview">
                            <div class="text-center p-4">
                                <svg class="w-6 h-6 text-muted mx-auto mb-1 group-hover:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                <span class="block text-[10px] font-bold text-muted group-hover:text-white leading-tight">Upload</span>
                            </div>
                        </template>

                        <template x-if="photoPreview">
                            <img :src="photoPreview" class="w-full h-full object-cover">
                        </template>
                    </div>
                </div>
                
                <p class="text-[10px] text-muted/60 leading-relaxed">Use a square headshot (1:1 aspect ratio) for optimal circular layouts.</p>
            </div>
        </div>

        {{-- Primary Details Right --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Full Display Name *</label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}" autofocus placeholder="e.g. Sarah Jenkins"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="role" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Agency Role Title *</label>
                        <input type="text" name="role" id="role" required value="{{ old('role') }}" placeholder="e.g. Head of Design"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Mini Narrative Biography</label>
                    <textarea name="bio" id="bio" rows="4" placeholder="Write a brief sentence highlighting expertise..."
                              class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none">{{ old('bio') }}</textarea>
                </div>

                <div class="border-t border-border/50 pt-6 space-y-4">
                    <h4 class="font-bold text-xs text-muted uppercase tracking-widest">Social Handles</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="linkedin" class="block text-[10px] font-bold text-muted uppercase mb-2">LinkedIn Profile URL</label>
                            <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/in/username"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div>
                            <label for="twitter" class="block text-[10px] font-bold text-muted uppercase mb-2">Twitter / X URL</label>
                            <input type="url" name="twitter" id="twitter" value="{{ old('twitter') }}" placeholder="https://x.com/username"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-8 py-4 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-2xl tracking-wider uppercase shadow-lg shadow-primary/10 transition-all">
                    Provision Member File
                </button>
            </div>
        </div>

    </form>

</div>
@endsection
