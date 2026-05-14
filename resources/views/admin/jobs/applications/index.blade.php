@extends('admin.layouts.app')

@section('title', 'Application Queue')
@section('page_title', 'Applications')

@section('content')
<div class="space-y-6">

    {{-- Navigation Path --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.jobs.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-muted hover:text-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Careers
        </a>
        
        <div class="text-right">
            <h2 class="text-base font-bold text-white">{{ $job->title }}</h2>
            <span class="text-xs text-muted">{{ $job->department }} &bull; {{ $job->location }}</span>
        </div>
    </div>

    {{-- Applicants Table --}}
    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-xl shadow-black/5">
        
        <div class="p-6 border-b border-border/50 bg-black/10 flex items-center">
            <h3 class="text-sm font-bold text-white uppercase tracking-wider">Active Candidate Stream ({{ $applications->total() }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-muted whitespace-nowrap">
                <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                    <tr>
                        <th class="px-6 py-4">Applicant Name</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Resume / Portfolio</th>
                        <th class="px-6 py-4">Timestamp</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/50">
                    @forelse($applications as $app)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4 font-bold text-white">{{ $app->name }}</td>
                            <td class="px-6 py-4 font-medium text-text">{{ $app->email }}</td>
                            <td class="px-6 py-4">
                                @if($app->resume_path)
                                    <a href="{{ asset($app->resume_path) }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:underline">
                                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Retrieve CV
                                    </a>
                                @else
                                    <span class="text-xs text-muted italic">Missing</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs text-muted font-medium">{{ $app->created_at->format('M d, Y — g:i A') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('admin.jobs.applications.show', [$job, $app]) }}" class="px-3 py-1.5 bg-white/5 hover:bg-primary border border-border hover:border-primary hover:text-white text-white font-bold rounded-lg text-xs transition">Review</a>
                                    <form method="POST" action="{{ route('admin.jobs.applications.destroy', [$job, $app]) }}" onsubmit="return confirm('Are you sure you want to eliminate this applicant and purge their uploaded files?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-[#FF4D6D]/5 border border-[#FF4D6D]/20 hover:bg-[#FF4D6D] hover:text-white text-[#FF4D6D] rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-muted font-medium">No candidate applications received for this career slot yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-black/10 border-t border-border/50">
            {{ $applications->links() }}
        </div>
    </div>

</div>
@endsection
