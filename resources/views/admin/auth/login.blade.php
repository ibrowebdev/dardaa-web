<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — DARDAA WEB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/zoika-font" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #0D0D14;
            font-family: 'DM Sans', sans-serif;
        }
        .glass-card {
            background: rgba(26, 26, 36, 0.7);
            backdrop-filter: blur(10px);
            border: 1px border rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="antialiased text-text min-h-screen flex items-center justify-center px-4 relative overflow-hidden">

    {{-- Abstract Background Gradients --}}
    <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-primary/10 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-secondary/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-md z-10">
        {{-- Logo Display --}}
        <div class="flex flex-col items-center mb-8">
            <span class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary mb-3" style="font-family: 'Zoika font', sans-serif">DW</span>
            <h2 class="text-xl font-bold tracking-tight text-white">Administrative Panel</h2>
            <p class="text-sm text-muted mt-1">Log in with your secure credentials</p>
        </div>

        {{-- Card Container --}}
        <div class="bg-[#1A1A24] border border-border/50 p-8 sm:p-10 rounded-2xl shadow-2xl shadow-black/30">
            
            {{-- Validation Failures --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400 text-sm">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-muted uppercase tracking-wider mb-2">Email Address</label>
                    <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"
                           class="w-full bg-[#111118] border border-border focus:border-primary focus:ring-1 focus:ring-primary text-white rounded-xl py-3 px-4 text-sm outline-none transition"
                           placeholder="admin@agency.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-semibold text-muted uppercase tracking-wider">Secure Password</label>
                    </div>
                    <input type="password" name="password" id="password" required
                           class="w-full bg-[#111118] border border-border focus:border-primary focus:ring-1 focus:ring-primary text-white rounded-xl py-3 px-4 text-sm outline-none transition"
                           placeholder="••••••••">
                </div>

                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-border bg-[#111118] text-primary focus:ring-primary transition">
                    <label for="remember" class="ml-2 block text-sm text-muted select-none cursor-pointer">Keep session active</label>
                </div>

                <button type="submit" class="w-full py-3 px-4 bg-primary hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/20 text-white rounded-xl text-sm font-bold uppercase tracking-wider transition-all duration-300">
                    Authenticate
                </button>
            </form>
        </div>

        {{-- Back to site --}}
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-xs text-muted hover:text-white transition-all flex items-center justify-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Portal
            </a>
        </div>
    </div>

</body>
</html>
