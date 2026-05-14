@extends('admin.layouts.app')

@section('title', 'Review Application')
@section('page_title', 'Review Candidate File')

@section('content')
<div class="max-w-4xl space-y-6">
    
    {{-- Controls --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.jobs.applications', $job) }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Stream
        </a>
        
        <form method="POST" action="{{ route('admin.jobs.applications.destroy', [$job, $application]) }}" onsubmit="return confirm('Completely delete this candidate record and associated assets?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-[#FF4D6D] hover:bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-500/10 transition">
                Destroy Candidate File
            </button>
        </form>
    </div>

    {{-- Candidate Sheet Container --}}
    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl shadow-xl overflow-hidden shadow-black/10">
        
        {{-- Header Grid --}}
        <div class="p-6 sm:p-8 bg-black/15 border-b border-border/50 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Applicant Fullname</label>
                <h2 class="text-lg font-black text-white">{{ $application->name }}</h2>
            </div>

            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Target Vacancy</label>
                <p class="text-base font-bold text-primary">{{ $job->title }}</p>
            </div>

            <div>
                <label class="block text-[10px] font-bold uppercase tracking-widest text-muted mb-1">Submitted Date</label>
                <p class="text-sm font-medium text-white">{{ $application->created_at->format('F j, Y @ g:i A') }}</p>
            </div>
        </div>

        {{-- Contact & CV bar --}}
        <div class="px-6 sm:px-8 py-5 bg-black/5 border-b border-border/50 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
            <div class="flex flex-wrap gap-5 text-sm">
                <div>
                    <span class="text-muted">Email: </span>
                    <a href="mailto:{{ $application->email }}" class="text-white font-bold hover:underline">{{ $application->email }}</a>
                </div>
                @if($application->phone)
                    <div>
                        <span class="text-muted">Contact: </span>
                        <span class="text-white font-bold">{{ $application->phone }}</span>
                    </div>
                @endif
            </div>

            @if($application->resume_path)
                <a href="{{ asset($application->resume_path) }}" target="_blank" class="inline-flex items-center justify-center gap-2 px-5 py-2 bg-primary hover:bg-primary-dark text-white font-bold text-xs uppercase tracking-wider shadow shadow-primary/15 rounded-xl transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Inspect Candidate CV
                </a>
            @endif
        </div>

        {{-- Cover letter body --}}
        <div class="p-6 sm:p-8 space-y-4">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-muted">Cover Letter / Executive Summary</label>
            <div class="bg-[#0D0D14] p-6 rounded-xl border border-border/50 text-text text-sm sm:text-base leading-relaxed font-medium whitespace-pre-wrap min-h-[200px]">
                {{ $application->cover_letter ?: 'No supporting cover letter was submitted.' }}
            </div>
        </div>

    </div>

</div>
@endsection
