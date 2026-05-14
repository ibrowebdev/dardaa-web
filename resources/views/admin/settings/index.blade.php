@extends('admin.layouts.app')

@section('title', 'Agency Configuration')
@section('page_title', 'Global Platform Configurations')

@section('content')
<div class="max-w-5xl">
    
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        {{-- Main Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Left Side: Core & Meta Details --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Agency Profile Card --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider border-b border-border/50 pb-3">Agency Identity</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Agency Title Name *</label>
                            <input type="text" name="settings[agency_name]" required value="{{ old('settings.agency_name', $currentSettings['agency_name'] ?? 'DARDAA WEB') }}"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Global Tagline</label>
                            <input type="text" name="settings[tagline]" value="{{ old('settings.tagline', $currentSettings['tagline'] ?? 'Next-gen digital products designed and engineered from scratch.') }}"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Primary Contact Email *</label>
                            <input type="email" name="settings[contact_email]" required value="{{ old('settings.contact_email', $currentSettings['contact_email'] ?? 'contact@dardaaweb.com') }}"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Office Phone line</label>
                            <input type="text" name="settings[contact_phone]" value="{{ old('settings.contact_phone', $currentSettings['contact_phone'] ?? '+1 (555) 000-0000') }}"
                                   class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Corporate Physical Address</label>
                            <textarea name="settings[address]" rows="3"
                                      class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none">{{ old('settings.address', $currentSettings['address'] ?? '100 digital avenue, suite 300, Silicon Valley, California.') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Search & Discovery Box --}}
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider border-b border-border/50 pb-3">Search Engine Optimization (SEO)</h3>
                    
                    <div>
                        <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Fallback Meta Title</label>
                        <input type="text" name="settings[meta_title]" value="{{ old('settings.meta_title', $currentSettings['meta_title'] ?? 'DARDAA WEB | Premium Design & Development Agency') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-muted uppercase tracking-widest mb-2">Fallback Meta Description</label>
                        <textarea name="settings[meta_description]" rows="4"
                                  class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm resize-none">{{ old('settings.meta_description', $currentSettings['meta_description'] ?? 'Premium boutique agency specializing in stunning, next-generation digital products and high-performance applications.') }}</textarea>
                    </div>
                </div>

            </div>

            {{-- Right side: Social configuration & Save --}}
            <div class="lg:col-span-1 space-y-6">
                
                <div class="bg-[#1A1A24] border border-border/50 rounded-2xl p-6 shadow-xl space-y-6">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider border-b border-border/50 pb-2">Social Channels</h3>
                    
                    <div>
                        <label class="block text-[10px] font-bold text-muted uppercase mb-2">LinkedIn Handle</label>
                        <input type="url" name="settings[linkedin_url]" value="{{ old('settings.linkedin_url', $currentSettings['linkedin_url'] ?? 'https://linkedin.com/company/dardaa-web') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-muted uppercase mb-2">Twitter / X Handle</label>
                        <input type="url" name="settings[twitter_url]" value="{{ old('settings.twitter_url', $currentSettings['twitter_url'] ?? 'https://x.com/dardaaweb') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-muted uppercase mb-2">Instagram Brand Page</label>
                        <input type="url" name="settings[instagram_url]" value="{{ old('settings.instagram_url', $currentSettings['instagram_url'] ?? 'https://instagram.com/dardaaweb') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-muted uppercase mb-2">Facebook Community Page</label>
                        <input type="url" name="settings[facebook_url]" value="{{ old('settings.facebook_url', $currentSettings['facebook_url'] ?? 'https://facebook.com/dardaaweb') }}"
                               class="w-full bg-[#0D0D14] border border-border focus:border-primary text-white rounded-xl px-4 py-3 outline-none transition text-sm">
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/15 text-white font-bold text-sm tracking-wider uppercase py-4 rounded-2xl shadow-md transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                    Update Settings
                </button>
            </div>

        </div>
    </form>

</div>
@endsection
