@extends('layouts.admin')

@section('title', 'Atur Tema, Kartu & Warna')
@section('header_title', 'Atur Tema, Kartu & Warna')

@section('content')
<div class="w-full space-y-8"
     x-data="{
         themeStyle: '{{ $settings['theme_style'] ?? 'white_purple' }}',
         primaryColor: '{{ $settings['theme_primary'] ?? '#7c3aed' }}',
         bgColor: '{{ $settings['theme_bg'] ?? '#f8fafc' }}',
         cardBg: '{{ $settings['theme_card_bg'] ?? '#ffffff' }}',
         cardText: '{{ $settings['theme_card_text'] ?? '#1e293b' }}',
         cardBorder: '{{ $settings['theme_card_border'] ?? '#f3e8ff' }}',
         cardRadius: '{{ $settings['theme_card_radius'] ?? 'rounded-[28px]' }}',
         buttonBg: '{{ $settings['theme_button_bg'] ?? '#ffffff' }}',
         buttonText: '{{ $settings['theme_button_text'] ?? '#1e293b' }}',
         buttonBorder: '{{ $settings['theme_button_border'] ?? '#e2e8f0' }}',

         presets: {
             white_purple: {
                 name: 'White & Purple',
                 primary: '#7c3aed',
                 bg: '#f8fafc',
                 card_bg: '#ffffff',
                 card_text: '#1e293b',
                 card_border: '#f3e8ff',
                 btn_bg: '#ffffff',
                 btn_text: '#1e293b',
                 btn_border: '#e2e8f0',
                 radius: 'rounded-[28px]'
             },
             corporate_navy: {
                 name: 'Corporate Navy',
                 primary: '#0ea5e9',
                 bg: '#0b1120',
                 card_bg: '#0f172a',
                 card_text: '#f1f5f9',
                 card_border: '#1e293b',
                 btn_bg: '#1e293b',
                 btn_text: '#f8fafc',
                 btn_border: '#334155',
                 radius: 'rounded-[28px]'
             },
             emerald_green: {
                 name: 'Eco Emerald',
                 primary: '#059669',
                 bg: '#f0fdf4',
                 card_bg: '#ffffff',
                 card_text: '#0f172a',
                 card_border: '#dcfce7',
                 btn_bg: '#ffffff',
                 btn_text: '#0f172a',
                 btn_border: '#a7f3d0',
                 radius: 'rounded-[28px]'
             },
             royal_blue: {
                 name: 'Royal Blue',
                 primary: '#2563eb',
                 bg: '#f0f7ff',
                 card_bg: '#ffffff',
                 card_text: '#0f172a',
                 card_border: '#dbeafe',
                 btn_bg: '#ffffff',
                 btn_text: '#0f172a',
                 btn_border: '#bfdbfe',
                 radius: 'rounded-[28px]'
             },
             dark_slate: {
                 name: 'Dark Slate & Gold',
                 primary: '#eab308',
                 bg: '#18181b',
                 card_bg: '#27272a',
                 card_text: '#fafafa',
                 card_border: '#3f3f46',
                 btn_bg: '#3f3f46',
                 btn_text: '#fafafa',
                 btn_border: '#52525b',
                 radius: 'rounded-[24px]'
             },
             modern_minimalist: {
                 name: 'Modern Minimalist',
                 primary: '#4f46e5',
                 bg: '#fafafa',
                 card_bg: '#ffffff',
                 card_text: '#18181b',
                 card_border: '#e4e4e7',
                 btn_bg: '#ffffff',
                 btn_text: '#18181b',
                 btn_border: '#d4d4d8',
                 radius: 'rounded-[20px]'
             }
         },

         applyPreset(key) {
             this.themeStyle = key;
             if (this.presets[key]) {
                 const p = this.presets[key];
                 this.primaryColor = p.primary;
                 this.bgColor = p.bg;
                 this.cardBg = p.card_bg;
                 this.cardText = p.card_text;
                 this.cardBorder = p.card_border;
                 this.buttonBg = p.btn_bg;
                 this.buttonText = p.btn_text;
                 this.buttonBorder = p.btn_border;
                 this.cardRadius = p.radius;
             }
         }
     }">

    <!-- Page Title & Header Info -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold font-display text-slate-900">Pengaturan Tema, Kartu & Skema Warna</h1>
            <p class="text-xs text-slate-500 mt-1">Sesuaikan desain kartu landing page, pilih tema preset, dan atur palet warna secara real-time.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-700 text-xs font-bold transition-all inline-flex items-center gap-1.5 self-start sm:self-auto">
            <i data-lucide="external-link" class="w-4 h-4"></i>
            <span>Buka Pratinjau Live</span>
        </a>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- SECTION 1: LIVE INTERACTIVE PREVIEW & THEME PRESETS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- Left: Theme Presets Selector (7 cols) -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                        <i data-lucide="palette" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-slate-900 font-display">1. Pilihan Preset Tema</h2>
                        <p class="text-xs text-slate-500">Klik preset di bawah untuk menerapkan kombinasi tema dan warna instan.</p>
                    </div>
                </div>

                <!-- Theme Presets Cards Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    
                    <!-- Preset 1: White & Purple -->
                    <div @click="applyPreset('white_purple')"
                         :class="themeStyle === 'white_purple' ? 'border-blue-600 ring-2 ring-blue-500/20 bg-blue-50/20' : 'border-slate-200 hover:border-blue-300'"
                         class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between relative group">
                        <input type="radio" name="theme_style" value="white_purple" class="sr-only" x-model="themeStyle">
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-900">White & Purple</span>
                                <span class="w-3.5 h-3.5 rounded-full border flex items-center justify-center" :class="themeStyle === 'white_purple' ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="themeStyle === 'white_purple'"></span>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">Tema bersih, modern, dan profesional.</p>
                        </div>
                        <div class="mt-3.5 flex items-center gap-1.5">
                            <span class="w-5 h-5 rounded-md bg-white border border-slate-200 shadow-2xs" title="Putih"></span>
                            <span class="w-5 h-5 rounded-md bg-purple-700 shadow-2xs" title="Ungu Korporat"></span>
                            <span class="w-5 h-5 rounded-md bg-violet-500 shadow-2xs" title="Aksen Violet"></span>
                        </div>
                    </div>

                    <!-- Preset 2: Corporate Navy -->
                    <div @click="applyPreset('corporate_navy')"
                         :class="themeStyle === 'corporate_navy' ? 'border-blue-600 ring-2 ring-blue-500/20 bg-blue-50/20' : 'border-slate-200 hover:border-blue-300'"
                         class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between relative group">
                        <input type="radio" name="theme_style" value="corporate_navy" class="sr-only" x-model="themeStyle">
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-900">Corporate Navy</span>
                                <span class="w-3.5 h-3.5 rounded-full border flex items-center justify-center" :class="themeStyle === 'corporate_navy' ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="themeStyle === 'corporate_navy'"></span>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">Dark mode futuristik dengan nuansa biru malam.</p>
                        </div>
                        <div class="mt-3.5 flex items-center gap-1.5">
                            <span class="w-5 h-5 rounded-md bg-slate-950 border border-slate-800 shadow-2xs" title="Dark Slate"></span>
                            <span class="w-5 h-5 rounded-md bg-sky-500 shadow-2xs" title="Cyan Accent"></span>
                            <span class="w-5 h-5 rounded-md bg-indigo-600 shadow-2xs" title="Royal Navy"></span>
                        </div>
                    </div>

                    <!-- Preset 3: Eco Emerald -->
                    <div @click="applyPreset('emerald_green')"
                         :class="themeStyle === 'emerald_green' ? 'border-blue-600 ring-2 ring-blue-500/20 bg-blue-50/20' : 'border-slate-200 hover:border-blue-300'"
                         class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between relative group">
                        <input type="radio" name="theme_style" value="emerald_green" class="sr-only" x-model="themeStyle">
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-900">Eco Emerald</span>
                                <span class="w-3.5 h-3.5 rounded-full border flex items-center justify-center" :class="themeStyle === 'emerald_green' ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="themeStyle === 'emerald_green'"></span>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">Nuansa hijau ramah lingkungan (Green Industrial Estate).</p>
                        </div>
                        <div class="mt-3.5 flex items-center gap-1.5">
                            <span class="w-5 h-5 rounded-md bg-white border border-slate-200 shadow-2xs" title="Putih"></span>
                            <span class="w-5 h-5 rounded-md bg-emerald-600 shadow-2xs" title="Emerald"></span>
                            <span class="w-5 h-5 rounded-md bg-teal-500 shadow-2xs" title="Teal Accent"></span>
                        </div>
                    </div>

                    <!-- Preset 4: Royal Blue -->
                    <div @click="applyPreset('royal_blue')"
                         :class="themeStyle === 'royal_blue' ? 'border-blue-600 ring-2 ring-blue-500/20 bg-blue-50/20' : 'border-slate-200 hover:border-blue-300'"
                         class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between relative group">
                        <input type="radio" name="theme_style" value="royal_blue" class="sr-only" x-model="themeStyle">
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-900">Royal Blue</span>
                                <span class="w-3.5 h-3.5 rounded-full border flex items-center justify-center" :class="themeStyle === 'royal_blue' ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="themeStyle === 'royal_blue'"></span>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">Warna biru korporat solid standar industri BUMN.</p>
                        </div>
                        <div class="mt-3.5 flex items-center gap-1.5">
                            <span class="w-5 h-5 rounded-md bg-white border border-slate-200 shadow-2xs" title="Putih"></span>
                            <span class="w-5 h-5 rounded-md bg-blue-700 shadow-2xs" title="Royal Blue"></span>
                            <span class="w-5 h-5 rounded-md bg-sky-500 shadow-2xs" title="Sky Accent"></span>
                        </div>
                    </div>

                    <!-- Preset 5: Dark Slate & Gold -->
                    <div @click="applyPreset('dark_slate')"
                         :class="themeStyle === 'dark_slate' ? 'border-blue-600 ring-2 ring-blue-500/20 bg-blue-50/20' : 'border-slate-200 hover:border-blue-300'"
                         class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between relative group">
                        <input type="radio" name="theme_style" value="dark_slate" class="sr-only" x-model="themeStyle">
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-900">Dark Slate & Gold</span>
                                <span class="w-3.5 h-3.5 rounded-full border flex items-center justify-center" :class="themeStyle === 'dark_slate' ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="themeStyle === 'dark_slate'"></span>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">Tema gelap mewah dengan aksen emas berwibawa.</p>
                        </div>
                        <div class="mt-3.5 flex items-center gap-1.5">
                            <span class="w-5 h-5 rounded-md bg-zinc-900 border border-zinc-700 shadow-2xs" title="Zinc Dark"></span>
                            <span class="w-5 h-5 rounded-md bg-yellow-500 shadow-2xs" title="Gold Accent"></span>
                            <span class="w-5 h-5 rounded-md bg-zinc-700 shadow-2xs" title="Slate"></span>
                        </div>
                    </div>

                    <!-- Preset 6: Modern Minimalist -->
                    <div @click="applyPreset('modern_minimalist')"
                         :class="themeStyle === 'modern_minimalist' ? 'border-blue-600 ring-2 ring-blue-500/20 bg-blue-50/20' : 'border-slate-200 hover:border-blue-300'"
                         class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between relative group">
                        <input type="radio" name="theme_style" value="modern_minimalist" class="sr-only" x-model="themeStyle">
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-900">Modern Minimalist</span>
                                <span class="w-3.5 h-3.5 rounded-full border flex items-center justify-center" :class="themeStyle === 'modern_minimalist' ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="themeStyle === 'modern_minimalist'"></span>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">Gaya monokrom bersih dengan sudut presisi modern.</p>
                        </div>
                        <div class="mt-3.5 flex items-center gap-1.5">
                            <span class="w-5 h-5 rounded-md bg-zinc-50 border border-zinc-200 shadow-2xs" title="Light Grey"></span>
                            <span class="w-5 h-5 rounded-md bg-indigo-600 shadow-2xs" title="Indigo Accent"></span>
                            <span class="w-5 h-5 rounded-md bg-zinc-900 shadow-2xs" title="Black"></span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right: Real-time Live Mini-Card Preview (5 cols) -->
            <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4 sticky top-24">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <i data-lucide="eye" class="w-4 h-4 text-blue-600"></i>
                        <h3 class="text-sm font-bold text-slate-900 font-display">Pratinjau Kartu Real-Time</h3>
                    </div>
                    <span class="text-[10px] font-bold text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded-full">
                        Live Preview
                    </span>
                </div>

                <!-- Simulation Container (Device Canvas) -->
                <div class="w-full rounded-2xl p-4 sm:p-5 transition-colors duration-300 border border-slate-200/80 shadow-inner flex flex-col items-center justify-center min-h-[360px]"
                     :style="'background-color: ' + bgColor + ';'">
                    
                    <!-- Simulating The Card -->
                    <div class="w-full max-w-[280px] shadow-xl border overflow-hidden transition-all duration-300"
                         :class="cardRadius"
                         :style="'background-color: ' + cardBg + '; border-color: ' + cardBorder + '; color: ' + cardText + ';'">
                        
                        <!-- Mini Card Header -->
                        <div class="p-4 text-center border-b"
                             :style="'border-color: ' + cardBorder + ';'">
                            <!-- Mini Logo -->
                            <div class="w-10 h-10 rounded-xl mx-auto mb-2 p-1.5 bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                                <img src="{{ asset($settings['logo'] ?? 'assets/logo kiw.png') }}" alt="Logo" class="w-full h-full object-contain">
                            </div>
                            <div class="text-[11px] font-extrabold tracking-wide uppercase font-display"
                                 :style="'color: ' + cardText + ';'">
                                {{ $settings['short'] ?? 'KIW COMMERCIAL' }}
                            </div>
                            <div class="text-[9px] opacity-75 mt-0.5"
                                 :style="'color: ' + cardText + ';'">
                                {{ Str::limit($settings['tagline'] ?? 'Integrated Industrial Estate', 35) }}
                            </div>
                        </div>

                        <!-- Mini Card Body -->
                        <div class="p-3.5 space-y-2">
                            <div class="text-center text-[9px] font-bold uppercase tracking-wider opacity-70"
                                 :style="'color: ' + cardText + ';'">
                                WEBSITE & PROFIL
                            </div>

                            <!-- Mini Buttons inside card -->
                            <div class="py-2 px-3 rounded-lg border text-center text-[10px] font-semibold transition-all shadow-2xs"
                                 :style="'background-color: ' + buttonBg + '; color: ' + buttonText + '; border-color: ' + buttonBorder + ';'">
                                Website Resmi PT KIW
                            </div>

                            <div class="py-2 px-3 rounded-lg border text-center text-[10px] font-semibold transition-all shadow-2xs"
                                 :style="'background-color: ' + buttonBg + '; color: ' + buttonText + '; border-color: ' + buttonBorder + ';'">
                                Profil & Fasilitas Industri
                            </div>

                            <!-- Accent Highlight Button -->
                            <div class="py-2 px-3 rounded-lg text-center text-[10px] font-bold text-white shadow-xs"
                                 :style="'background-color: ' + primaryColor + ';'">
                                WhatsApp Marketing
                            </div>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <span class="text-[9px] font-mono opacity-60"
                              :style="'color: ' + (themeStyle === 'corporate_navy' || themeStyle === 'dark_slate' ? '#cbd5e1' : '#64748b') + ';'">
                            Visual kartu landing page
                        </span>
                    </div>

                </div>

            </div>

        </div>

        <!-- SECTION 2: PALET WARNA DETAIL (COLOR PALETTES) -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="droplet" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-900 font-display">2. Kustomisasi Skema Warna (Color Picker)</h2>
                    <p class="text-xs text-slate-500">Sesuaikan setiap elemen warna kartu dan halaman sesuai brand panduan visual Anda.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                
                <!-- 1. Primary Accent Color -->
                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-2">
                    <label class="block text-xs font-bold text-slate-800">Warna Aksen Utama (Primary)</label>
                    <p class="text-[11px] text-slate-500">Digunakan untuk tombol sorotan, badge aktif, dan aksen navigasi.</p>
                    <div class="flex items-center gap-2.5 pt-1">
                        <input type="color" x-model="primaryColor"
                               class="w-10 h-10 p-0.5 rounded-xl border border-slate-200 cursor-pointer shrink-0">
                        <input type="text" name="theme_primary" x-model="primaryColor"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-mono font-semibold text-slate-800">
                    </div>
                </div>

                <!-- 2. Page Body Background Color -->
                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-2">
                    <label class="block text-xs font-bold text-slate-800">Warna Background Halaman</label>
                    <p class="text-[11px] text-slate-500">Warna kanvas utama landing page di belakang kartu bertumpuk.</p>
                    <div class="flex items-center gap-2.5 pt-1">
                        <input type="color" x-model="bgColor"
                               class="w-10 h-10 p-0.5 rounded-xl border border-slate-200 cursor-pointer shrink-0">
                        <input type="text" name="theme_bg" x-model="bgColor"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-mono font-semibold text-slate-800">
                    </div>
                </div>

                <!-- 3. Card Background Color -->
                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-2">
                    <label class="block text-xs font-bold text-slate-800">Warna Background Kartu</label>
                    <p class="text-[11px] text-slate-500">Warna dasar kartu slide penampung daftar link layanan.</p>
                    <div class="flex items-center gap-2.5 pt-1">
                        <input type="color" x-model="cardBg"
                               class="w-10 h-10 p-0.5 rounded-xl border border-slate-200 cursor-pointer shrink-0">
                        <input type="text" name="theme_card_bg" x-model="cardBg"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-mono font-semibold text-slate-800">
                    </div>
                </div>

                <!-- 4. Card Text Color -->
                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-2">
                    <label class="block text-xs font-bold text-slate-800">Warna Teks & Judul Kartu</label>
                    <p class="text-[11px] text-slate-500">Warna font teks utama dan judul di dalam kartu.</p>
                    <div class="flex items-center gap-2.5 pt-1">
                        <input type="color" x-model="cardText"
                               class="w-10 h-10 p-0.5 rounded-xl border border-slate-200 cursor-pointer shrink-0">
                        <input type="text" name="theme_card_text" x-model="cardText"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-mono font-semibold text-slate-800">
                    </div>
                </div>

                <!-- 5. Card Border Color -->
                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-2">
                    <label class="block text-xs font-bold text-slate-800">Warna Garis Border Kartu</label>
                    <p class="text-[11px] text-slate-500">Warna garis tepi pembatas sekeliling kartu.</p>
                    <div class="flex items-center gap-2.5 pt-1">
                        <input type="color" x-model="cardBorder"
                               class="w-10 h-10 p-0.5 rounded-xl border border-slate-200 cursor-pointer shrink-0">
                        <input type="text" name="theme_card_border" x-model="cardBorder"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-mono font-semibold text-slate-800">
                    </div>
                </div>

                <!-- 6. Button Border Color -->
                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-2">
                    <label class="block text-xs font-bold text-slate-800">Warna Border Tombol Layanan</label>
                    <p class="text-[11px] text-slate-500">Warna garis batas tombol-tombol link di dalam kartu.</p>
                    <div class="flex items-center gap-2.5 pt-1">
                        <input type="color" x-model="buttonBorder"
                               class="w-10 h-10 p-0.5 rounded-xl border border-slate-200 cursor-pointer shrink-0">
                        <input type="text" name="theme_button_border" x-model="buttonBorder"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-mono font-semibold text-slate-800">
                    </div>
                </div>

            </div>
        </div>

        <!-- SECTION 3: PENGATURAN DESAIN KARTU (CARD STYLING) -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="layers" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-900 font-display">3. Pengaturan Gaya Kartu (Card Styling)</h2>
                    <p class="text-xs text-slate-500">Atur bentuk sudut dan kelengkungan kartu landing page pengunjung.</p>
                </div>
            </div>

            <!-- Card Radius Options -->
            <div>
                <label class="block text-xs font-bold text-slate-800 mb-3">Kelengkungan Sudut Kartu (Border Radius)</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    
                    <label @click="cardRadius = 'rounded-xl'"
                           :class="cardRadius === 'rounded-xl' ? 'border-blue-600 bg-blue-50/40 text-blue-900 ring-2 ring-blue-500/20' : 'border-slate-200 hover:border-blue-200 text-slate-700'"
                           class="p-4 rounded-xl border-2 cursor-pointer transition-all flex flex-col items-center justify-center text-center">
                        <input type="radio" name="theme_card_radius" value="rounded-xl" class="sr-only" x-model="cardRadius">
                        <div class="w-12 h-8 rounded-xl border-2 border-dashed border-blue-400 mb-2"></div>
                        <span class="text-xs font-bold">Minimalis</span>
                        <span class="text-[10px] text-slate-400 font-mono">12px (rounded-xl)</span>
                    </label>

                    <label @click="cardRadius = 'rounded-2xl'"
                           :class="cardRadius === 'rounded-2xl' ? 'border-blue-600 bg-blue-50/40 text-blue-900 ring-2 ring-blue-500/20' : 'border-slate-200 hover:border-blue-200 text-slate-700'"
                           class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col items-center justify-center text-center">
                        <input type="radio" name="theme_card_radius" value="rounded-2xl" class="sr-only" x-model="cardRadius">
                        <div class="w-12 h-8 rounded-2xl border-2 border-dashed border-blue-400 mb-2"></div>
                        <span class="text-xs font-bold">Elegan</span>
                        <span class="text-[10px] text-slate-400 font-mono">16px (rounded-2xl)</span>
                    </label>

                    <label @click="cardRadius = 'rounded-[28px]'"
                           :class="cardRadius === 'rounded-[28px]' ? 'border-blue-600 bg-blue-50/40 text-blue-900 ring-2 ring-blue-500/20' : 'border-slate-200 hover:border-blue-200 text-slate-700'"
                           class="p-4 rounded-2xl border-2 cursor-pointer transition-all flex flex-col items-center justify-center text-center">
                        <input type="radio" name="theme_card_radius" value="rounded-[28px]" class="sr-only" x-model="cardRadius">
                        <div class="w-12 h-8 rounded-[20px] border-2 border-dashed border-blue-500 mb-2"></div>
                        <span class="text-xs font-bold">Kurva Modern (Default)</span>
                        <span class="text-[10px] text-slate-400 font-mono">28px (rounded-28px)</span>
                    </label>

                    <label @click="cardRadius = 'rounded-[36px]'"
                           :class="cardRadius === 'rounded-[36px]' ? 'border-blue-600 bg-blue-50/40 text-blue-900 ring-2 ring-blue-500/20' : 'border-slate-200 hover:border-blue-200 text-slate-700'"
                           class="p-4 rounded-3xl border-2 cursor-pointer transition-all flex flex-col items-center justify-center text-center">
                        <input type="radio" name="theme_card_radius" value="rounded-[36px]" class="sr-only" x-model="cardRadius">
                        <div class="w-12 h-8 rounded-[26px] border-2 border-dashed border-blue-400 mb-2"></div>
                        <span class="text-xs font-bold">Sangat Bulat</span>
                        <span class="text-[10px] text-slate-400 font-mono">36px (rounded-36px)</span>
                    </label>

                </div>
            </div>

            <!-- Direct Link to Card Content Management -->
            <div class="p-4 rounded-2xl bg-blue-50/50 border border-blue-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-blue-600 text-white flex items-center justify-center shrink-0">
                        <i data-lucide="layers" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-900">Ingin Mengatur Urutan & Isi Tombol Tiap Kartu?</div>
                        <div class="text-[11px] text-slate-500">Anda dapat menambah, mengedit, atau menghapus kartu serta tombol di dalamnya pada menu Kelola Kartu.</div>
                    </div>
                </div>
                <a href="{{ route('admin.slides.index') }}" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-xs shrink-0 inline-flex items-center gap-1.5 self-start sm:self-auto">
                    <span>Buka Pengaturan Kartu</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>

        <!-- SECTION 4: LOGO & IDENTITAS PERSEROAN -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="building" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-900 font-display">4. Identitas & Kontak Perseroan</h2>
                    <p class="text-xs text-slate-500">Informasi resmi perusahaan, logo, kontak WhatsApp, telepon, serta tautan navigasi.</p>
                </div>
            </div>

            <!-- Logo Upload -->
            <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80">
                <label class="block text-xs font-bold text-slate-800 mb-2">Logo Resmi Perusahaan (.PNG / .SVG)</label>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-white border border-slate-200 p-2 flex items-center justify-center shrink-0 shadow-sm">
                        <img src="{{ asset($settings['logo'] ?? 'assets/logo kiw.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1 min-w-0">
                        <input type="file" name="logo_file" accept="image/*"
                               class="text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1.5">Gunakan gambar berlatar transparan dengan resolusi minimal 200x200 pixel.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Resmi Perseroan *</label>
                    <input type="text" name="name" value="{{ old('name', $settings['name'] ?? '') }}" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Singkat / Header Kartu *</label>
                    <input type="text" name="short" value="{{ old('short', $settings['short'] ?? '') }}" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor WhatsApp CS / Marketing (Format: 628xxx) *</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}" required placeholder="Contoh: 628112345678"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <span class="text-[10px] text-slate-400">Gunakan format angka internasional tanpa tanda '+'</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor WhatsApp Tampilan (Display)</label>
                    <input type="text" name="whatsapp_display" value="{{ old('whatsapp_display', $settings['whatsapp_display'] ?? '') }}" placeholder="Contoh: +62 811-2345-678"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Telepon Kantor / Helpdesk</label>
                    <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email Resmi Marketing</label>
                    <input type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">URL Website Resmi</label>
                    <input type="url" name="website" value="{{ old('website', $settings['website'] ?? '') }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Teks Badge Footer</label>
                    <input type="text" name="footer_badge" value="{{ old('footer_badge', $settings['footer_badge'] ?? '') }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Tagline Kawasan Industri</label>
                <input type="text" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? '') }}"
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Alamat Lengkap Kantor</label>
                <textarea name="address" rows="2"
                          class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">{{ old('address', $settings['address'] ?? '') }}</textarea>
            </div>
        </div>

        <!-- Sticky Bottom Submit Button Bar -->
        <div class="flex items-center justify-between gap-4 pt-2 pb-6">
            <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-100 text-xs font-semibold text-slate-700 transition-colors">
                Batal
            </a>
            <button type="submit"
                    class="px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-lg shadow-blue-600/25 active:scale-[0.99] flex items-center gap-2 cursor-pointer">
                <i data-lucide="check" class="w-4 h-4"></i>
                <span>Simpan Perubahan</span>
            </button>
        </div>

    </form>

</div>
@endsection
