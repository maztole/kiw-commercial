<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator — KIW Commercial</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo kiw.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="desktop-bg-pattern min-h-screen flex items-center justify-center p-4 sm:p-6 text-slate-800 antialiased relative overflow-x-hidden selection:bg-purple-600 selection:text-white"
      x-data="{ showPassword: false }">

    <!-- Ambient Glow Decorative Elements -->
    <div class="fixed top-1/4 -left-32 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-1/4 -right-32 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-[460px] relative z-10">

        <!-- Top Header: Official Logo & Brand Identity -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-flex flex-col items-center group">
                <div class="w-20 h-20 rounded-2xl p-[1.5px] bg-blue-600 shadow-lg shadow-blue-600/20 flex items-center justify-center mb-3 transition-all duration-300 group-hover:scale-105">
                    <div class="w-full h-full rounded-[14.5px] bg-white flex items-center justify-center p-2.5">
                        <img src="{{ asset('assets/logo kiw.png') }}" alt="KIW Commercial" class="w-full h-full object-contain">
                    </div>
                </div>
                <h1 class="font-display text-2xl font-extrabold text-slate-900 tracking-tight">
                    KIW COMMERCIAL
                </h1>
            </a>
        </div>

        <!-- Premium Login Card -->
        <div class="bg-white rounded-[28px] shadow-xl shadow-slate-200/60 border border-slate-200/80 p-7 sm:p-9 relative overflow-hidden">
            <!-- Top Accent Line -->
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-blue-600"></div>

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900 font-display">Masuk Administrator</h2>
            </div>

            @if(session('success'))
                <div class="mb-5 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-2.5 shadow-xs">
                    <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="mb-5 p-3.5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs flex items-center gap-2.5 shadow-xs">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600 shrink-0"></i>
                    <span class="font-medium">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Email Input Field -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="nama@email.com"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                    </div>
                </div>

                <!-- Password Input Field with Toggle Visibility -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </span>
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required placeholder="••••••••"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-11 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                        
                        <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-blue-600 transition-colors focus:outline-none cursor-pointer"
                                title="Lihat kata sandi">
                            <i data-lucide="eye" x-show="!showPassword" class="w-4 h-4"></i>
                            <i data-lucide="eye-off" x-show="showPassword" class="w-4 h-4" style="display: none;"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between text-xs pt-0.5">
                    <label class="flex items-center gap-2 cursor-pointer text-slate-600 select-none hover:text-slate-800">
                        <input type="checkbox" name="remember" checked class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 transition-all cursor-pointer">
                        <span class="font-medium text-xs">Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3.5 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs tracking-wide transition-all duration-200 shadow-md shadow-blue-600/25 hover:shadow-blue-600/35 active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer uppercase">
                        <span>Masuk ke Dashboard</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

            <!-- Bottom Back Link -->
            <div class="mt-6 pt-5 border-t border-slate-100 text-center">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 inline-flex items-center gap-1.5 transition-colors">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                    <span>Kembali ke Halaman Landing Page</span>
                </a>
            </div>
        </div>

        <!-- Copyright Footer -->
        <div class="text-center mt-6 space-y-1">
            <p class="text-[11px] text-slate-400 font-medium">
                &copy; {{ date('Y') }} PT Kawasan Industri Wijayakusuma
            </p>
            <p class="text-[10px] text-slate-400 font-mono tracking-wider">
                KIW Commercial Engine
            </p>
        </div>

    </div>

</body>
</html>
