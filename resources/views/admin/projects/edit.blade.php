@extends('admin.layouts.app')

@section('title', 'Edit Project')
@section('page_title', 'Refine Project Asset')

@section('content')
<div class="max-w-5xl">
    
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Library
    </a>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Primary Input Group --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label for="title" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Project Title *</label>
                            <input type="text" name="title" id="title" required value="{{ old('title', $project->title) }}"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="slug" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Permalink URL Slug *</label>
                            <div class="flex rounded-xl overflow-hidden border border-border bg-[#0D0D14] focus-within:border-primary transition">
                                <span class="px-4 py-3 text-sm text-muted border-r border-border bg-black/20">/portfolio/</span>
                                <input type="text" name="slug" id="slug" required value="{{ old('slug', $project->slug) }}"
                                       class="flex-1 bg-transparent text-white px-4 py-3 outline-none text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="client" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Client Name</label>
                            <input type="text" name="client" id="client" value="{{ old('client', $project->client) }}" placeholder="e.g. TechCorp Inc."
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div>
                            <label for="category" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Category Cluster *</label>
                            <select name="category" id="category" required
                                    class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm cursor-pointer">
                                @foreach(['Web Design', 'E-Commerce', 'Branding', 'SEO', 'Development'] as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $project->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Teaser Short Summary *</label>
                        <textarea name="description" id="description" required rows="3" placeholder="Condensed project teaser..."
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div>
                        <label for="body" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Case Study Context / Body Content</label>
                        <textarea name="body" id="body" rows="10" placeholder="Breakdown of design/dev cycle..."
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm font-sans">{{ old('body', $project->body) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Upload & Actions Column --}}
            <div class="lg:col-span-1 space-y-6">
                
                {{-- Cover Graphic Upload --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-4">
                    <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Cover Graphic</h3>
                    
                    <div x-data="{ photoPreview: '{{ $project->image ? asset($project->image) : '' }}' }" class="space-y-4">
                        <input type="file" name="image" id="image" class="hidden" accept="image/*"
                               x-ref="photo"
                               x-on:change="
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                               ">
                        
                        <div class="w-full h-48 rounded-xl border-2 border-dashed border-border hover:border-primary bg-[#0D0D14] relative cursor-pointer overflow-hidden flex items-center justify-center transition group"
                             x-on:click.prevent="$refs.photo.click()">
                            
                            <template x-if="!photoPreview">
                                <div class="text-center p-6">
                                    <svg class="w-8 h-8 text-muted mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="block text-xs font-bold text-muted">Replace cover graphic</span>
                                </div>
                            </template>

                            <template x-if="photoPreview">
                                <div class="relative w-full h-full group">
                                    <img :src="photoPreview" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                                        <span class="text-white font-bold text-xs tracking-wider uppercase bg-primary px-3 py-1.5 rounded-md">Swap Image</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Properties Box --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-5">
                    <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Integration Properties</h3>
                    
                    <div>
                        <label for="tech_stack" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Tech Stack Cluster</label>
                        <input type="text" name="tech_stack" id="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" placeholder="React, Laravel..."
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="url" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Live Destination URL</label>
                        <input type="url" name="url" id="url" value="{{ old('url', $project->url) }}" placeholder="https://client-demo.com"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="results" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Performance / Results Metrics</label>
                        <textarea name="results" id="results" rows="3" placeholder="Performance outcomes..."
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none">{{ old('results', $project->results) }}</textarea>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/15 text-white font-bold text-sm tracking-wider uppercase py-4 rounded-2xl shadow-md transition-all">
                    Save Modifications
                </button>
            </div>

        </div>
    </form>

</div>
@endsection
