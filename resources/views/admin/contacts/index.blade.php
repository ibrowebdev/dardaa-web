@extends('admin.layouts.app')

@section('title', 'Contact Inquiries')
@section('page_title', 'Contact Inquiries')

@section('content')
<div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-lg shadow-black/10 flex flex-col">
    
    {{-- Table Controls --}}
    <div class="px-6 py-5 border-b border-border/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-black/10">
        <form action="{{ route('admin.contacts.index') }}" method="GET" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 flex-1">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search name, email..." 
                       class="bg-[#111118] text-sm text-white placeholder-muted px-4 py-2 pl-10 rounded-lg border border-border outline-none focus:border-primary transition min-w-[240px]">
                <svg class="w-4 h-4 text-muted absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <select name="status" onchange="this.form.submit()" class="bg-[#111118] text-sm text-white px-4 py-2 rounded-lg border border-border outline-none focus:border-primary transition cursor-pointer">
                <option value="">All Read Statuses</option>
                <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Unread Only</option>
                <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read Only</option>
            </select>
            
            @if(request()->filled('search') || request()->filled('status'))
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-[#FF4D6D] hover:underline font-bold self-center flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Table Data --}}
    <div class="overflow-x-auto flex-1">
        <table class="w-full text-sm text-left text-muted whitespace-nowrap">
            <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                <tr>
                    <th class="px-6 py-4 w-12">Status</th>
                    <th class="px-6 py-4">Sender</th>
                    <th class="px-6 py-4">Subject</th>
                    <th class="px-6 py-4">Date Submitted</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border/50">
                @forelse($contacts as $contact)
                    <tr class="transition-colors hover:bg-white/[0.02] {{ !$contact->is_read ? 'bg-primary/5 border-l-4 border-l-primary' : '' }}">
                        <td class="px-6 py-4">
                            @if(!$contact->is_read)
                                <span class="px-2 py-1 text-[10px] font-bold uppercase tracking-wider bg-[#FF4D6D]/10 text-[#FF4D6D] rounded border border-[#FF4D6D]/20">Unread</span>
                            @else
                                <span class="px-2 py-1 text-[10px] font-bold uppercase tracking-wider bg-white/5 text-muted rounded border border-border">Read</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col font-medium text-white">
                                <span>{{ $contact->name }}</span>
                                <span class="text-xs text-muted font-normal">{{ $contact->email }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-text max-w-md truncate font-semibold">{{ $contact->subject }}</td>
                        <td class="px-6 py-4 text-xs">{{ $contact->created_at->format('M d, Y — g:i A') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center gap-3">
                                <form method="POST" action="{{ route('admin.contacts.markRead', $contact) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-xs text-muted hover:text-primary font-medium transition" title="Toggle read status">
                                        {{ $contact->is_read ? 'Mark Unread' : 'Mark Read' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="px-3 py-1.5 bg-white/5 border border-border hover:bg-primary hover:text-white hover:border-primary text-white rounded-lg transition text-xs font-semibold">View</a>
                                
                                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Proceed with deleting this submission?')">
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
                        <td colspan="5" class="px-6 py-16 text-center text-muted font-medium">No inquiries match the current filters.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-border/50 bg-black/10">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
