@extends('admin.layouts.app')

@section('title', 'Job Openings')
@section('page_title', 'Job Vacancies')

@section('content')
<div class="space-y-6">
    
    {{-- Control Header --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <form action="{{ route('admin.jobs.index') }}" method="GET" class="relative flex-1 max-w-md w-full">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search vacancies by title or location..." 
                   class="w-full bg-[#1A1A24] text-sm text-white placeholder-muted px-4 py-2.5 pl-11 rounded-xl border border-border outline-none focus:border-primary transition">
            <svg class="w-4.5 h-4.5 text-muted absolute left-4 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
        <a href="{{ route('admin.jobs.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-xl shadow-lg shadow-primary/15 tracking-wide transition shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Open Vacancy
        </a>
    </div>

    {{-- Openings Table --}}
    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-muted whitespace-nowrap">
                <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                    <tr>
                        <th class="px-6 py-4">Vacancy Details</th>
                        <th class="px-6 py-4">Location</th>
                        <th class="px-6 py-4">Hiring Status</th>
                        <th class="px-6 py-4">Applicants</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/50">
                    @forelse($jobs as $job)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col min-w-0">
                                    <span class="text-sm font-bold text-white truncate">{{ $job->title }}</span>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-xs text-muted">{{ $job->department }}</span>
                                        <span class="w-1 h-1 bg-muted rounded-full"></span>
                                        <span class="text-[10px] font-bold uppercase tracking-wider bg-white/5 px-1.5 py-0.5 border border-border rounded text-white">{{ $job->type }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-text">{{ $job->location }}</td>
                            <td class="px-6 py-4">
                                @if($job->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#00C896]/10 border border-[#00C896]/20 text-xs font-bold text-[#00C896]"><span class="w-1.5 h-1.5 bg-[#00C896] rounded-full shadow shadow-[#00C896]"></span> Hiring</span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-white/5 border border-border text-xs font-bold text-muted">Closed</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-extrabold">
                                <a href="{{ route('admin.jobs.applications', $job) }}" class="inline-flex items-center gap-1.5 px-3 py-1 bg-[#6C63FF]/10 border border-[#6C63FF]/20 text-primary rounded-lg text-xs font-bold hover:bg-primary hover:text-white transition-colors">
                                    {{ $job->applications()->count() }} Candidates
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('admin.jobs.edit', $job) }}" class="p-2 bg-white/5 border border-border text-muted hover:bg-primary hover:text-white hover:border-primary rounded-lg transition" title="Edit Posting">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('CAUTION: This will permanently purge this listing and all attached candidate CV applications. Proceed?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-[#FF4D6D]/5 border border-[#FF4D6D]/20 text-[#FF4D6D] hover:bg-[#FF4D6D] hover:text-white rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-muted font-medium">No active openings published. Target talent pool now.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-black/10 border-t border-border/50">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
@endsection
