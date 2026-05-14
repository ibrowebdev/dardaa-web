@extends('admin.layouts.app')

@section('title', 'Refine Insight')
@section('page_title', 'Modify Content Entry')

@section('content')
<div class="max-w-5xl">
    
    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Library
    </a>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Primary inputs --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                    
                    <div>
                        <label for="title" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Headline *</label>
                        <input type="text" name="title" id="title" required value="{{ old('title', $post->title) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">URL Slug *</label>
                        <div class="flex rounded-xl overflow-hidden border border-border bg-[#0D0D14] focus-within:border-primary transition">
                            <span class="px-4 py-3 text-sm text-muted border-r border-border bg-black/20">/blog/</span>
                            <input type="text" name="slug" id="slug" required value="{{ old('slug', $post->slug) }}"
                                   class="flex-1 bg-transparent text-white px-4 py-3 outline-none text-sm">
                        </div>
                    </div>

                    <div x-data="{ text: '{{ old('excerpt', $post->excerpt) }}', limit: 300 }" class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label for="excerpt" class="block text-xs font-bold text-muted uppercase tracking-widest">Excerpt Teaser</label>
                            <span class="text-[10px] font-bold" :class="text.length > limit ? 'text-[#FF4D6D]' : 'text-muted'">
                                <span x-text="text.length"></span>/<span x-text="limit"></span>
                            </span>
                        </div>
                        <textarea name="excerpt" id="excerpt" rows="3" x-model="text" maxlength="300" placeholder="Summary for feed displays (max 300 chars)..."
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none"></textarea>
                    </div>

                    <div>
                        <label for="body" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Article Narrative Body *</label>
                        <textarea name="body" id="body" rows="15" required
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm font-sans">{{ old('body', $post->body) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Sidebar options --}}
            <div class="lg:col-span-1 space-y-6">
                
                {{-- Thumbnail Upload --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-4">
                    <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Cover Media</h3>
                    
                    <div x-data="{ photoPreview: '{{ $post->thumbnail ? asset($post->thumbnail) : '' }}' }" class="space-y-4">
                        <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*"
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
                                    <span class="block text-xs font-bold text-muted">Replace graphic thumbnail</span>
                                </div>
                            </template>

                            <template x-if="photoPreview">
                                <div class="relative w-full h-full group">
                                    <img :src="photoPreview" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                                        <span class="text-white font-bold text-xs tracking-wider uppercase bg-primary px-3 py-1.5 rounded-md">Swap File</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Meta box --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-5">
                    <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Publish Properties</h3>
                    
                    <div>
                        <label for="category" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Stream Domain *</label>
                        <select name="category" id="category" required
                                class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm cursor-pointer">
                            @foreach(['Design', 'Development', 'SEO', 'Business', 'News'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $post->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="author" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Author Identity *</label>
                        <input type="text" name="author" id="author" required 
                               value="{{ old('author', $post->author) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="published_at" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Schedule Live Release</label>
                        <input type="datetime-local" name="published_at" id="published_at" 
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm cursor-pointer">
                        <span class="text-[10px] text-muted/60 mt-1 block">Draft entries are omitted from frontend streams.</span>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/15 text-white font-bold text-sm tracking-wider uppercase py-4 rounded-2xl shadow-md transition-all">
                    Commit Modifications
                </button>
            </div>

        </div>
    </form>

</div>
@endsection
