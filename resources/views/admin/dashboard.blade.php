@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Administrative Overview')

@section('content')
<div class="space-y-8">

    {{-- Stat Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Stat Card 1 --}}
        <div class="bg-[#1A1A24] border border-border/50 p-6 rounded-2xl shadow-lg shadow-black/10 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-[#FF4D6D]/10 text-[#FF4D6D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-muted uppercase tracking-wider">Unread Contacts</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $stats['unread_contacts'] }}</p>
            </div>
        </div>

        {{-- Stat Card 2 --}}
        <div class="bg-[#1A1A24] border border-border/50 p-6 rounded-2xl shadow-lg shadow-black/10 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-muted uppercase tracking-wider">Quote Inquiries</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $stats['quotes'] }}</p>
            </div>
        </div>

        {{-- Stat Card 3 --}}
        <div class="bg-[#1A1A24] border border-border/50 p-6 rounded-2xl shadow-lg shadow-black/10 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-secondary/10 text-secondary flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-muted uppercase tracking-wider">Live Projects</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $stats['projects'] }}</p>
            </div>
        </div>

        {{-- Stat Card 4 --}}
        <div class="bg-[#1A1A24] border border-border/50 p-6 rounded-2xl shadow-lg shadow-black/10 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-[#00C896]/10 text-[#00C896] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-muted uppercase tracking-wider">Job Applicants</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $stats['job_applications'] }}</p>
            </div>
        </div>
    </div>

    {{-- Split Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- Recent Contacts --}}
        <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden flex flex-col shadow-lg shadow-black/10">
            <div class="px-6 py-5 border-b border-border/50 flex items-center justify-between bg-black/10">
                <h3 class="font-bold text-white">Recent Contact Inquiries</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-xs font-semibold text-primary hover:text-white transition">View All</a>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-sm text-left text-muted">
                    <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                        <tr>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Subject</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/50">
                        @forelse($recentContacts as $contact)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-6 py-4 font-medium text-white">
                                    <div class="flex items-center gap-2">
                                        @if(!$contact->is_read)
                                            <span class="w-2 h-2 rounded-full bg-[#FF4D6D] inline-block shrink-0" title="Unread"></span>
                                        @endif
                                        <span class="truncate">{{ $contact->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 truncate max-w-[150px]">{{ $contact->subject }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $contact->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-xs bg-white/5 hover:bg-primary hover:text-white transition border border-border text-muted px-3 py-1.5 rounded-lg font-medium">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-muted font-medium">No recent contact submissions.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Recent Quotes --}}
        <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden flex flex-col shadow-lg shadow-black/10">
            <div class="px-6 py-5 border-b border-border/50 flex items-center justify-between bg-black/10">
                <h3 class="font-bold text-white">Recent Project Estimates</h3>
                <a href="{{ route('admin.quotes.index') }}" class="text-xs font-semibold text-primary hover:text-white transition">View All</a>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-sm text-left text-muted">
                    <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                        <tr>
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Budget</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/50">
                        @forelse($recentQuotes as $quote)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-6 py-4 font-medium text-white">
                                    <div class="flex flex-col">
                                        <span>{{ $quote->name }}</span>
                                        <span class="text-xs text-muted font-normal">{{ $quote->company ?? 'No Company' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-[#00C896]">{{ $quote->budget }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $quote->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.quotes.show', $quote) }}" class="text-xs bg-white/5 hover:bg-primary hover:text-white transition border border-border text-muted px-3 py-1.5 rounded-lg font-medium">Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-muted font-medium">No project inquiries received.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Recent Blog Posts Table --}}
    <div class="bg-[#1A1A24] border border-border/50 rounded-2xl overflow-hidden shadow-lg shadow-black/10">
        <div class="px-6 py-5 border-b border-border/50 flex items-center justify-between bg-black/10">
            <h3 class="font-bold text-white">Latest Insights & Articles</h3>
            <div class="flex gap-4">
                <a href="{{ route('admin.posts.index') }}" class="text-xs font-semibold text-muted hover:text-white transition self-center">View All</a>
                <a href="{{ route('admin.posts.create') }}" class="text-xs bg-primary hover:shadow-lg hover:shadow-primary/20 text-white px-3 py-1.5 rounded-lg font-bold tracking-wider uppercase transition">New Article</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-muted">
                <thead class="bg-black/20 text-xs font-bold uppercase tracking-wider text-white border-b border-border/50">
                    <tr>
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Published</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/50">
                    @forelse($recentPosts as $post)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4 font-semibold text-white">
                                <div class="flex items-center gap-3">
                                    @if($post->thumbnail)
                                        <img src="{{ asset($post->thumbnail) }}" alt="" class="w-10 h-10 rounded-lg object-cover shrink-0 border border-border bg-surface">
                                    @endif
                                    <span class="truncate">{{ $post->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span class="px-2 py-1 bg-white/5 border border-border rounded text-xs">{{ $post->category }}</span></td>
                            <td class="px-6 py-4 text-xs">{{ $post->published_at ? $post->published_at->format('M d, Y') : '—' }}</td>
                            <td class="px-6 py-4">
                                @if($post->published_at && $post->published_at->isPast())
                                    <span class="text-xs text-[#00C896] font-bold flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-[#00C896]"></span> Live</span>
                                @else
                                    <span class="text-xs text-[#FFC107] font-bold flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-[#FFC107]"></span> Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center gap-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="p-1.5 hover:text-primary transition border border-transparent hover:border-border hover:bg-white/5 rounded-md" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-muted font-medium">No articles produced yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
