@props(['project'])

<div {{ $attributes->merge(['class' => 'bg-surface border border-border rounded-2xl overflow-hidden card-hover group flex flex-col h-full']) }}>
    <div class="aspect-[4/3] relative overflow-hidden">
        <img src="{{ $project->image ?: 'https://picsum.photos/seed/' . $project->id . '/800/600' }}" 
             alt="{{ $project->title }}" 
             class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
        <div class="absolute top-4 left-4">
            <span class="px-3 py-1 text-xs font-medium glass !bg-surface/80 rounded-full text-primary border border-primary/20">{{ $project->category }}</span>
        </div>
    </div>
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <h3 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors" style="font-family: var(--font-display)">{{ $project->title }}</h3>
            <p class="text-muted text-sm leading-relaxed mb-4 line-clamp-3">{{ $project->description }}</p>
        </div>
        <a href="{{ route('portfolio.show', $project->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-text hover:text-primary transition-colors group/link">
            View Case Study
            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</div>
