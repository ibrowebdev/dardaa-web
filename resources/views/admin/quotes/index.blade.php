@extends('admin.layouts.app')

@section('title', 'Project Quotes')
@section('page_title', 'Project Quotes')

@section('content')
<div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-lg shadow-black/10 flex flex-col">
    
    {{-- Controls --}}
    <div class="px-6 py-5 border-b border-border/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-black/10">
        <form action="{{ route('admin.quotes.index') }}" method="GET" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 flex-1">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search client, company..." 
                       class="bg-[#111118] text-sm text-white placeholder-muted px-4 py-2 pl-10 rounded-lg border border-border outline-none focus:border-primary transition min-w-[240px]">
                <svg class="w-4 h-4 text-muted absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            @if(request('search'))
                <a href="{{ route('admin.quotes.index') }}" class="text-xs text-[#FF4D6D] hover:underline font-bold flex items-center gap-1">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-muted whitespace-nowrap">
            <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                <tr>
                    <th class="px-6 py-4">Client</th>
                    <th class="px-6 py-4">Services Requested</th>
                    <th class="px-6 py-4">Budget Frame</th>
                    <th class="px-6 py-4">Timeline</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border/50">
                @forelse($quotes as $quote)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex flex-col font-medium text-white">
                                <span>{{ $quote->name }}</span>
                                <span class="text-xs text-muted font-normal">{{ $quote->company ?: 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <div class="flex flex-wrap gap-1.5 max-w-xs">
                                @php
                                    $services = is_array($quote->services) ? $quote->services : (json_decode($quote->services, true) ?: []);
                                @endphp
                                @foreach(array_slice($services, 0, 3) as $service)
                                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-border">{{ $service }}</span>
                                @endforeach
                                @if(count($services) > 3)
                                    <span class="px-2 py-0.5 rounded-md bg-primary/10 border border-primary/20 text-primary">+{{ count($services) - 3 }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-[#00C896]">{{ $quote->budget }}</td>
                        <td class="px-6 py-4 text-text text-xs font-medium">{{ $quote->timeline }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center gap-3">
                                <a href="{{ route('admin.quotes.show', $quote) }}" class="px-3 py-1.5 bg-white/5 border border-border hover:bg-primary hover:text-white hover:border-primary text-white rounded-lg transition text-xs font-semibold">Details</a>
                                
                                <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" onsubmit="return confirm('Confirm delete of this project quote request?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#FF4D6D] hover:text-white hover:bg-[#FF4D6D] p-1.5 rounded-md border border-transparent hover:border-red-500/20 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center text-muted font-medium">No estimate requests recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-border/50 bg-black/10">
        {{ $quotes->links() }}
    </div>
</div>
@endsection
