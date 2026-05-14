@props(['post'])

<div {{ $attributes->merge(['class' => 'bg-surface border border-border rounded-2xl overflow-hidden card-hover group flex flex-col h-full']) }}>
    <div class="aspect-[16/9] relative overflow-hidden bg-surface-light">
        <img src="{{ $post->thumbnail ?: 'https://picsum.photos/seed/' . $post->id . '/800/450' }}" 
             alt="{{ $post->title }}" 
             class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
        <div class="absolute top-4 left-4">
            <span class="px-3 py-1 text-xs font-medium glass !bg-surface/80 rounded-full text-primary border border-primary/20">{{ $post->category }}</span>
        </div>
    </div>
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 text-muted text-xs mb-3">
                <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</span>
                <span>•</span>
                <span>{{ $post->read_time }} min read</span>
            </div>
            <h3 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors line-clamp-2" style="font-family: var(--font-display)">{{ $post->title }}</h3>
            <p class="text-muted text-sm leading-relaxed mb-4 line-clamp-2">{{ $post->excerpt }}</p>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-border">
            <span class="text-xs font-medium text-text">By {{ $post->author }}</span>
            <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-text hover:text-primary transition-colors group/link">
                Read More
                <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</div>
