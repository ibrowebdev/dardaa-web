@extends('admin.layouts.app')

@section('title', 'Draft Insight')
@section('page_title', 'Draft Content Asset')

@section('content')
<div class="max-w-5xl">
    
    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Library
    </a>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Primary Fields Column --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                    
                    <div>
                        <label for="title" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Headline *</label>
                        <input type="text" name="title" id="title" required value="{{ old('title') }}" autofocus placeholder="The future of scalable agency architecture..."
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">URL Slug *</label>
                        <div class="flex rounded-xl overflow-hidden border border-border bg-[#0D0D14] focus-within:border-primary transition">
                            <span class="px-4 py-3 text-sm text-muted border-r border-border bg-black/20">/blog/</span>
                            <input type="text" name="slug" id="slug" required value="{{ old('slug') }}"
                                   class="flex-1 bg-transparent text-white px-4 py-3 outline-none text-sm">
                        </div>
                    </div>

                    <div x-data="{ text: '{{ old('excerpt') }}', limit: 300 }" class="space-y-2">
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
                        <textarea name="body" id="body" rows="15" required placeholder="Craft your comprehensive long-form breakdown..."
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm font-sans">{{ old('body') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Meta-Configuration Column --}}
            <div class="lg:col-span-1 space-y-6">
                
                {{-- File Upload Block --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-4">
                    <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Cover Media</h3>
                    
                    <div x-data="{ photoPreview: null }" class="space-y-4">
                        <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*" required
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
                                    <svg class="w-8 h-8 text-muted mx-auto mb-2 group-hover:text-primary transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="block text-xs font-bold text-muted group-hover:text-white">Select Thumbnail</span>
                                    <span class="block text-[10px] text-muted/60 mt-1">Ratio 16:9 (Max 2MB)</span>
                                </div>
                            </template>

                            <template x-if="photoPreview">
                                <img :src="photoPreview" class="w-full h-full object-cover">
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Properties Block --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-5">
                    <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Publish Properties</h3>
                    
                    <div>
                        <label for="category" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Stream Domain *</label>
                        <select name="category" id="category" required
                                class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm cursor-pointer">
                            @foreach(['Design', 'Development', 'SEO', 'Business', 'News'] as $cat)
                                <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="author" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Author Identity *</label>
                        <input type="text" name="author" id="author" required 
                               value="{{ old('author', Auth::guard('admin')->user()->name) }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="published_at" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Schedule Live Release</label>
                        <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm cursor-pointer">
                        <span class="text-[10px] text-muted/60 mt-1 block">Leave blank to stage as an inactive Draft.</span>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/15 text-white font-bold text-sm tracking-wider uppercase py-4 rounded-2xl shadow-md transition-all">
                    Publish Feed Asset
                </button>
            </div>

        </div>
    </form>

</div>

{{-- Realtime logic --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        if (titleInput && slugInput) {
            titleInput.addEventListener('input', function () {
                const slugValue = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                slugInput.value = slugValue;
            });
        }
    });
</script>
@endsection
