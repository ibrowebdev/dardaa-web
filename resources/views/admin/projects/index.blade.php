@extends('admin.layouts.app')

@section('title', 'Portfolio Projects')
@section('page_title', 'Portfolio Library')

@section('content')
<div class="space-y-6">
    {{-- Top action bar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <form action="{{ route('admin.projects.index') }}" method="GET" class="relative flex-1 max-w-md w-full">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search projects by title or client..." 
                   class="w-full bg-[#1A1A24] text-sm text-white placeholder-muted px-4 py-2.5 pl-11 rounded-xl border border-border outline-none focus:border-primary transition">
            <svg class="w-4.5 h-4.5 text-muted absolute left-4 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary hover:bg-primary-dark text-white font-bold text-sm rounded-xl shadow-lg shadow-primary/15 tracking-wide transition shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Deploy New Project
        </a>
    </div>

    {{-- Library Grid / Table --}}
    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-xl shadow-black/10">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-muted whitespace-nowrap">
                <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                    <tr>
                        <th class="px-6 py-4 w-20">Thumbnail</th>
                        <th class="px-6 py-4">Project Title</th>
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/50">
                    @forelse($projects as $project)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4">
                                @if($project->image)
                                    <img src="{{ asset($project->image) }}" alt="" class="w-12 h-12 rounded-lg object-cover border border-border/50 bg-surface">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-[#0D0D14] border border-dashed border-border flex items-center justify-center text-muted font-bold">N/A</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-extrabold text-white">
                                <div class="flex flex-col max-w-xs truncate">
                                    <span>{{ $project->title }}</span>
                                    <span class="text-xs text-muted font-normal tracking-tight">{{ $project->slug }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-text">{{ $project->client ?: 'Internal Lab' }}</td>
                            <td class="px-6 py-4"><span class="px-2.5 py-1 bg-white/5 border border-border text-xs rounded-full text-white font-semibold">{{ $project->category }}</span></td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 border border-transparent hover:border-border hover:bg-white/5 text-muted hover:text-white rounded-xl transition" title="Edit Config">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Are you sure you want to destroy this project? All stored media assets will be purged.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 border border-transparent hover:border-red-500/20 hover:bg-[#FF4D6D]/10 text-[#FF4D6D] rounded-xl transition">
                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-muted font-medium">No deployed portfolio pieces. Add your first today!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-black/10 border-t border-border/50">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
