@props(['member'])

<div {{ $attributes->merge(['class' => 'bg-surface border border-border rounded-2xl overflow-hidden card-hover group']) }}>
    <div class="aspect-[3/4] relative overflow-hidden bg-surface-light">
        <img src="{{ $member->photo ?: 'https://i.pravatar.cc/400?u=' . $member->id }}" 
             alt="{{ $member->name }}" 
             class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
        @if($member->linkedin || $member->twitter)
            <div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6 gap-3">
                @if($member->linkedin)
                    <a href="{{ $member->linkedin }}" target="_blank" class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                @endif
                @if($member->twitter)
                    <a href="{{ $member->twitter }}" target="_blank" class="w-10 h-10 rounded-xl bg-surface border border-border flex items-center justify-center text-text hover:border-primary transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                @endif
            </div>
        @endif
    </div>
    <div class="p-6 text-center">
        <h3 class="text-xl font-bold" style="font-family: var(--font-display)">{{ $member->name }}</h3>
        <p class="text-primary text-sm font-medium mb-3">{{ $member->role }}</p>
        <p class="text-muted text-xs leading-relaxed line-clamp-2">{{ $member->bio }}</p>
    </div>
</div>
