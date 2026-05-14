@extends('admin.layouts.app')

@section('title', 'Open Vacancy')
@section('page_title', 'Draft Career Listing')

@section('content')
<div class="max-w-4xl">
    
    <a href="{{ route('admin.jobs.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Vacancies
    </a>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf

        {{-- Form Fields Left --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                
                <div>
                    <label for="title" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Listing Title *</label>
                    <input type="text" name="title" id="title" required value="{{ old('title') }}" autofocus placeholder="e.g. Senior Full-Stack Engineer"
                           class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                </div>

                <div>
                    <label for="slug" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Permalink / Slug *</label>
                    <div class="flex rounded-xl overflow-hidden border border-border bg-[#0D0D14] focus-within:border-primary transition">
                        <span class="px-4 py-3 text-sm text-muted border-r border-border bg-black/20">/careers/</span>
                        <input type="text" name="slug" id="slug" required value="{{ old('slug') }}"
                               class="flex-1 bg-transparent text-white px-4 py-3 outline-none text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="department" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Department Unit *</label>
                        <input type="text" name="department" id="department" required value="{{ old('department') }}" placeholder="e.g. Engineering"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="location" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Job Location *</label>
                        <input type="text" name="location" id="location" required value="{{ old('location') }}" placeholder="e.g. Remote / New York"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Role Description & Criteria *</label>
                    <textarea name="description" id="description" rows="12" required placeholder="Detail responsibilities, qualifications, and benefits..."
                              class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm font-sans leading-relaxed">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Action Config Sidebar Right --}}
        <div class="lg:col-span-1 space-y-6">
            
            <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-6">
                <h3 class="font-bold text-sm text-white uppercase tracking-wider border-b border-border/50 pb-2">Properties</h3>
                
                <div>
                    <label for="type" class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Contract Modality *</label>
                    <select name="type" id="type" required
                            class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm cursor-pointer">
                        @foreach(['Full-Time', 'Part-Time', 'Contract', 'Remote'] as $type)
                            <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-border/50">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-white uppercase tracking-wider">Hiring Mode</span>
                        <span class="text-[10px] text-muted mt-0.5">Accept new candidates.</span>
                    </div>
                    
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-[#0D0D14] peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#00C896]"></div>
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold text-sm tracking-wider uppercase py-4 rounded-2xl shadow-lg shadow-primary/10 transition-all">
                Publish Career File
            </button>
        </div>

    </form>

</div>

{{-- Auto generation logic --}}
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
