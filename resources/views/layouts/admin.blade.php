<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — KIW Commercial</title>
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
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex" 
      x-data="{ 
          sidebarOpen: window.innerWidth >= 1024 
              ? (localStorage.getItem('admin_sidebar_open') !== null ? localStorage.getItem('admin_sidebar_open') === 'true' : true)
              : false,
          toggleSidebar() {
              this.sidebarOpen = !this.sidebarOpen;
              if (window.innerWidth >= 1024) {
                  localStorage.setItem('admin_sidebar_open', this.sidebarOpen);
              }
          }
      }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-40 lg:hidden"
         style="display: none;"></div>

    <!-- SIDEBAR -->
    <aside :class="sidebarOpen ? 'translate-x-0 w-72 lg:w-72' : '-translate-x-full lg:translate-x-0 w-72 lg:w-20'"
           class="fixed inset-y-0 left-0 z-50 bg-white border-r border-slate-200 flex flex-col justify-between transition-all duration-300 ease-in-out lg:static shadow-xl lg:shadow-none overflow-x-hidden shrink-0 select-none">
        
        <div class="w-full h-full flex flex-col justify-between overflow-y-auto overflow-x-hidden">
            <div>
                <!-- Sidebar Header -->
                <div class="h-18 flex items-center border-b border-slate-100 shrink-0 transition-all duration-300"
                     :class="sidebarOpen ? 'px-5 sm:px-6 justify-between' : 'px-2 justify-center'">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shrink-0 shadow-sm group-hover:scale-105 transition-transform p-1.5">
                            <img src="{{ asset('assets/logo kiw.png') }}" alt="KIW" class="w-full h-full object-contain bg-white rounded-lg p-0.5">
                        </div>
                        <div x-show="sidebarOpen" x-transition.opacity.duration.200ms class="overflow-hidden whitespace-nowrap">
                            <div class="font-display font-bold text-sm tracking-wider text-slate-900 leading-tight">KIW COMMERCIAL</div>
                            <div class="text-xs text-blue-600 font-bold tracking-wider">ADMIN PANEL</div>
                        </div>
                    </a>
                    <button x-show="sidebarOpen" 
                            @click="sidebarOpen = false" 
                            type="button"
                            class="p-2 rounded-xl text-slate-400 hover:text-blue-700 hover:bg-blue-50 transition-colors cursor-pointer lg:hidden"
                            title="Tutup Menu"
                            aria-label="Tutup Menu">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Navigation Section -->
                <div class="py-4 transition-all duration-300" :class="sidebarOpen ? 'px-4' : 'px-2.5'">
                    <div x-show="sidebarOpen" x-transition.opacity class="px-3 pt-1 pb-2 text-[11px] font-bold text-slate-400 tracking-wider uppercase whitespace-nowrap">
                        Menu Utama
                    </div>
                    <div x-show="!sidebarOpen" class="w-8 h-px bg-slate-200 mx-auto mb-3"></div>

                    <nav class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}"
                           title="Ringkasan Dashboard"
                           :class="sidebarOpen ? 'px-4 py-3 justify-start' : 'h-12 w-12 mx-auto justify-center p-0'"
                           class="flex items-center gap-3.5 rounded-2xl text-sm sm:text-base font-semibold transition-all group relative {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-600 group-hover:text-blue-700' }}"></i>
                            <span x-show="sidebarOpen" x-transition.opacity.duration.200ms class="truncate whitespace-nowrap">Ringkasan Dashboard</span>
                        </a>

                        <a href="{{ route('admin.slides.index') }}"
                           title="Kelola & Atur Kartu (Cards)"
                           :class="sidebarOpen ? 'px-4 py-3 justify-start' : 'h-12 w-12 mx-auto justify-center p-0'"
                           class="flex items-center gap-3.5 rounded-2xl text-sm sm:text-base font-semibold transition-all group relative {{ request()->routeIs('admin.slides.*') || request()->routeIs('admin.items.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i data-lucide="layers" class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.slides.*') || request()->routeIs('admin.items.*') ? 'text-white' : 'text-blue-600 group-hover:text-blue-700' }}"></i>
                            <span x-show="sidebarOpen" x-transition.opacity.duration.200ms class="truncate whitespace-nowrap">Atur Kartu (Cards)</span>
                        </a>

                        <a href="{{ route('admin.settings.index') }}"
                           title="Atur Tema & Skema Warna"
                           :class="sidebarOpen ? 'px-4 py-3 justify-start' : 'h-12 w-12 mx-auto justify-center p-0'"
                           class="flex items-center gap-3.5 rounded-2xl text-sm sm:text-base font-semibold transition-all group relative {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i data-lucide="palette" class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-blue-600 group-hover:text-blue-700' }}"></i>
                            <span x-show="sidebarOpen" x-transition.opacity.duration.200ms class="truncate whitespace-nowrap">Atur Tema & Warna</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Sidebar Footer -->
            <div class="py-4 border-t border-slate-100 space-y-2 shrink-0 transition-all duration-300"
                 :class="sidebarOpen ? 'px-4' : 'px-2.5'">
                <a href="{{ route('home') }}" target="_blank"
                   title="Lihat Halaman Live"
                   :class="sidebarOpen ? 'px-4 py-3 justify-between' : 'h-12 w-12 mx-auto justify-center p-0'"
                   class="flex items-center rounded-2xl bg-blue-50 hover:bg-blue-100/80 text-blue-900 text-sm font-semibold transition-colors group">
                    <span class="flex items-center gap-3">
                        <i data-lucide="external-link" class="w-5 h-5 text-blue-600 shrink-0"></i>
                        <span x-show="sidebarOpen" x-transition.opacity.duration.200ms class="whitespace-nowrap">Lihat Halaman Live</span>
                    </span>
                    <i data-lucide="arrow-up-right" x-show="sidebarOpen" class="w-4 h-4 text-blue-400 shrink-0"></i>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            title="Keluar Akun"
                            :class="sidebarOpen ? 'px-4 py-3 justify-start' : 'h-12 w-12 mx-auto justify-center p-0'"
                            class="w-full flex items-center gap-3 rounded-2xl text-rose-600 hover:bg-rose-50 text-sm font-semibold transition-colors cursor-pointer">
                        <i data-lucide="log-out" class="w-5 h-5 shrink-0"></i>
                        <span x-show="sidebarOpen" x-transition.opacity.duration.200ms class="whitespace-nowrap">Keluar Akun</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 transition-all duration-300">
        <!-- Top Navbar -->
        <header class="h-18 bg-white border-b border-slate-200 px-4 sm:px-6 flex items-center justify-between shrink-0 sticky top-0 z-30">
            <div class="flex items-center gap-3">
                <button @click="toggleSidebar()" 
                        type="button"
                        class="p-2.5 rounded-xl border border-slate-200 text-slate-600 hover:text-blue-700 hover:bg-blue-50 hover:border-blue-200 transition-colors cursor-pointer flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                        title="Buka / Tutup Sidebar"
                        aria-label="Buka / Tutup Sidebar">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <div class="font-display font-bold text-base sm:text-lg text-slate-900">
                    @yield('header_title', 'Dashboard')
                </div>
            </div>

            <div class="flex items-center gap-4 text-xs sm:text-sm">
                <div class="hidden sm:flex items-center gap-2 text-slate-500">
                    <i data-lucide="calendar" class="w-4 h-4 text-blue-600"></i>
                    <span class="font-medium">{{ date('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-2.5 pl-3 border-l border-slate-200">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center text-xs">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <span class="font-semibold text-slate-700 hidden sm:inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-6 md:p-8 w-full">
            @if(session('success'))
                <div x-data="{ show: true }"
                     x-show="show"
                     x-init="setTimeout(() => show = false, 3000)"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                     class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm flex items-center justify-between gap-3 shadow-xs">
                    <div class="flex items-center gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0"></i>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button type="button" @click="show = false" class="text-emerald-600 hover:text-emerald-800 p-1 rounded-lg transition-colors cursor-pointer" title="Tutup">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif

            @if(session('error') || (isset($errors) && $errors->any()))
                <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm flex items-center gap-3 shadow-xs">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 shrink-0"></i>
                    <span class="font-medium">{{ session('error') ?? ($errors->first() ?? '') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
