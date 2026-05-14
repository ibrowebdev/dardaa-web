@props([
    'title',
    'subtitle' => null,
    'align' => 'center'
])

<div {{ $attributes->merge(['class' => 'reveal mb-12 ' . ($align === 'center' ? 'text-center mx-auto max-w-3xl' : 'text-left')]) }}>
    @if($subtitle)
        <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">{{ $subtitle }}</span>
    @endif
    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-text" style="font-family: var(--font-display)">
        {{ $title }}
    </h2>
    <div class="mt-4 h-1 w-20 {{ $align === 'center' ? 'mx-auto' : '' }} bg-gradient-to-r from-primary to-secondary rounded-full"></div>
</div>
