<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') — DARDAA WEB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700;9..40,900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/zoika-font" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --admin-bg: #0D0D14;
            --admin-sidebar: #111118;
            --admin-card: #1A1A24;
            --admin-accent: #6C63FF;
            --admin-danger: #FF4D6D;
            --admin-success: #00C896;
            --font-body: 'DM Sans', sans-serif;
            --font-logo: 'Zoika font', sans-serif;
        }
        body {
            background-color: var(--admin-bg);
            color: #E5E7EB;
            font-family: var(--font-body);
        }
        .sidebar-link.active {
            background-color: rgba(108, 99, 255, 0.1);
            border-left: 4px solid var(--admin-accent);
            color: #FFFFFF;
        }
        .sidebar-link {
            border-left: 4px solid transparent;
        }
        /* Scrollbars */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: var(--admin-bg);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--admin-card);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--admin-accent);
        }
    </style>
</head>
<body class="antialiased flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="w-64 bg-[#111118] border-r border-border/50 flex flex-col shrink-0 overflow-y-auto">
        {{-- Brand --}}
        <div class="h-20 border-b border-border/50 flex items-center px-6 shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary" style="font-family: var(--font-logo)">DW</span>
                <span class="font-semibold text-sm uppercase tracking-widest text-muted">Admin</span>
            </a>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 py-6 px-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.contacts.index') }}" class="sidebar-link flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Contacts
                </div>
                @if(isset($unreadCount) && $unreadCount > 0)
                    <span class="px-2 py-0.5 text-xs font-bold text-white bg-[#FF4D6D] rounded-full">{{ $unreadCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.quotes.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                Quote Requests
            </a>

            <a href="{{ route('admin.projects.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Portfolio / Projects
            </a>

            <a href="{{ route('admin.posts.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Blog Posts
            </a>

            <a href="{{ route('admin.team.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Team Members
            </a>

            <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                Testimonials
            </a>

            <a href="{{ route('admin.jobs.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Jobs & Applications
            </a>

            <a href="{{ route('admin.settings.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg text-muted hover:text-white hover:bg-white/5 transition {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </a>
        </nav>

        {{-- Footer/User Info --}}
        <div class="p-4 border-t border-border/50 bg-black/20 shrink-0">
            <div class="flex items-center justify-between mb-4">
                <div class="flex flex-col min-w-0">
                    <span class="text-sm font-semibold truncate text-white">{{ Auth::guard('admin')->user()?->name }}</span>
                    <span class="text-xs truncate text-muted">{{ Auth::guard('admin')->user()?->email }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 px-4 bg-surface-light hover:bg-red-500/10 hover:text-red-400 border border-border text-muted rounded-lg text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Content Wrapper --}}
    <div class="flex-1 flex flex-col overflow-hidden bg-[#0D0D14]">
        {{-- Top bar --}}
        <header class="h-20 bg-[#111118]/50 backdrop-blur border-b border-border/50 flex items-center justify-between px-8 shrink-0">
            <h1 class="text-lg font-bold text-white tracking-tight">@yield('page_title', 'Dashboard')</h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="text-xs font-medium px-3 py-1.5 bg-white/5 hover:bg-white/10 border border-border text-muted rounded-lg transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Website
                </a>
            </div>
        </header>

        {{-- Main Scrollable Area --}}
        <main class="flex-1 overflow-y-auto p-8">
            {{-- Banners --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-[#00C896]/10 border border-[#00C896]/30 rounded-xl flex items-center gap-3 text-[#00C896]">
                    <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-[#FF4D6D]/10 border border-[#FF4D6D]/30 rounded-xl flex items-center gap-3 text-[#FF4D6D]">
                    <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-[#FF4D6D]/10 border border-[#FF4D6D]/30 rounded-xl text-[#FF4D6D]">
                    <ul class="list-disc pl-5 text-sm font-medium space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Page Content --}}
            @yield('content')
        </main>
    </div>

</body>
</html>
