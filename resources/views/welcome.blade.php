<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>{{ $settings['short'] ?? 'KIW COMMERCIAL' }} — {{ $settings['tagline'] ?? 'Integrated Industrial Estate' }}</title>
    
    <!-- Meta SEO & OpenGraph -->
    <meta name="description" content="Portal Link Resmi KIW Commercial: Konsultasi Investasi Lahan, SFB Siap Pakai, Pergudangan Logistik, dan Akses Strategis.">
    <meta property="og:title" content="{{ $settings['short'] ?? 'KIW COMMERCIAL' }} — Portal Resmi">
    <meta property="og:description" content="Layanan Cepat & Informasi Kawasan Industri Wijayakusuma.">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset($settings['logo'] ?? 'assets/logo kiw.png') }}">

    <!-- Fonts: Plus Jakarta Sans & Inter (Modern, Clean & Ultra-Professional) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
        $themeStyle = $settings['theme_style'] ?? 'white_purple';

        // Definisi konfigurasi warna tiap preset tema
        $themePalettes = [
            'white_purple' => [
                'bg_body' => '#f8fafc',
                'card_bg' => '#ffffff',
                'card_text' => '#1e293b',
                'card_border' => '#f3e8ff',
                'primary' => '#7c3aed',
                'primary_hover' => '#6d28d9',
                'primary_light' => '#f5f3ff',
                'primary_border' => '#ddd6fe',
                'button_bg' => '#ffffff',
                'button_text' => '#1e293b',
                'button_border' => '#e2e8f0',
                'accent_grad' => 'from-purple-500 via-indigo-600 to-violet-500',
                'glow1' => 'rgba(124, 58, 237, 0.08)',
                'glow2' => 'rgba(99, 102, 241, 0.08)',
                'card_radius' => 'rounded-[28px] md:rounded-[32px]',
                'is_dark' => false,
            ],
            'corporate_navy' => [
                'bg_body' => '#0b1120',
                'card_bg' => '#0f172a',
                'card_text' => '#f1f5f9',
                'card_border' => '#1e293b',
                'primary' => '#0ea5e9',
                'primary_hover' => '#0284c7',
                'primary_light' => 'rgba(14, 165, 233, 0.12)',
                'primary_border' => 'rgba(14, 165, 233, 0.3)',
                'button_bg' => '#1e293b',
                'button_text' => '#f8fafc',
                'button_border' => '#334155',
                'accent_grad' => 'from-sky-400 via-blue-500 to-indigo-500',
                'glow1' => 'rgba(14, 165, 233, 0.15)',
                'glow2' => 'rgba(99, 102, 241, 0.15)',
                'card_radius' => 'rounded-[28px] md:rounded-[32px]',
                'is_dark' => true,
            ],
            'emerald_green' => [
                'bg_body' => '#f0fdf4',
                'card_bg' => '#ffffff',
                'card_text' => '#0f172a',
                'card_border' => '#dcfce7',
                'primary' => '#059669',
                'primary_hover' => '#047857',
                'primary_light' => '#ecfdf5',
                'primary_border' => '#a7f3d0',
                'button_bg' => '#ffffff',
                'button_text' => '#0f172a',
                'button_border' => '#a7f3d0',
                'accent_grad' => 'from-emerald-500 via-teal-600 to-cyan-500',
                'glow1' => 'rgba(16, 185, 129, 0.08)',
                'glow2' => 'rgba(20, 184, 166, 0.08)',
                'card_radius' => 'rounded-[28px] md:rounded-[32px]',
                'is_dark' => false,
            ],
            'royal_blue' => [
                'bg_body' => '#f0f7ff',
                'card_bg' => '#ffffff',
                'card_text' => '#0f172a',
                'card_border' => '#dbeafe',
                'primary' => '#2563eb',
                'primary_hover' => '#1d4ed8',
                'primary_light' => '#eff6ff',
                'primary_border' => '#bfdbfe',
                'button_bg' => '#ffffff',
                'button_text' => '#0f172a',
                'button_border' => '#bfdbfe',
                'accent_grad' => 'from-blue-500 via-indigo-600 to-sky-500',
                'glow1' => 'rgba(37, 99, 235, 0.08)',
                'glow2' => 'rgba(14, 165, 233, 0.08)',
                'card_radius' => 'rounded-[28px] md:rounded-[32px]',
                'is_dark' => false,
            ],
            'dark_slate' => [
                'bg_body' => '#18181b',
                'card_bg' => '#27272a',
                'card_text' => '#fafafa',
                'card_border' => '#3f3f46',
                'primary' => '#eab308',
                'primary_hover' => '#ca8a04',
                'primary_light' => 'rgba(234, 179, 8, 0.15)',
                'primary_border' => 'rgba(234, 179, 8, 0.3)',
                'button_bg' => '#3f3f46',
                'button_text' => '#fafafa',
                'button_border' => '#52525b',
                'accent_grad' => 'from-amber-400 via-yellow-500 to-amber-600',
                'glow1' => 'rgba(234, 179, 8, 0.12)',
                'glow2' => 'rgba(245, 158, 11, 0.12)',
                'card_radius' => 'rounded-[24px] md:rounded-[28px]',
                'is_dark' => true,
            ],
            'modern_minimalist' => [
                'bg_body' => '#fafafa',
                'card_bg' => '#ffffff',
                'card_text' => '#18181b',
                'card_border' => '#e4e4e7',
                'primary' => '#4f46e5',
                'primary_hover' => '#4338ca',
                'primary_light' => '#eef2ff',
                'primary_border' => '#c7d2fe',
                'button_bg' => '#ffffff',
                'button_text' => '#18181b',
                'button_border' => '#d4d4d8',
                'accent_grad' => 'from-indigo-500 via-purple-600 to-violet-500',
                'glow1' => 'rgba(79, 70, 229, 0.06)',
                'glow2' => 'rgba(124, 58, 237, 0.06)',
                'card_radius' => 'rounded-[20px] md:rounded-[24px]',
                'is_dark' => false,
            ],
        ];

        $currentTheme = $themePalettes[$themeStyle] ?? $themePalettes['white_purple'];

        // Overrides kustom dari database settings
        if (!empty($settings['theme_primary'])) {
            $currentTheme['primary'] = $settings['theme_primary'];
        }
        if (!empty($settings['theme_bg'])) {
            $currentTheme['bg_body'] = $settings['theme_bg'];
        }
        if (!empty($settings['theme_card_bg'])) {
            $currentTheme['card_bg'] = $settings['theme_card_bg'];
        }
        if (!empty($settings['theme_card_text'])) {
            $currentTheme['card_text'] = $settings['theme_card_text'];
        }
        if (!empty($settings['theme_card_border'])) {
            $currentTheme['card_border'] = $settings['theme_card_border'];
        }
        if (!empty($settings['theme_card_radius'])) {
            $currentTheme['card_radius'] = $settings['theme_card_radius'];
        }
        if (!empty($settings['theme_button_bg'])) {
            $currentTheme['button_bg'] = $settings['theme_button_bg'];
        }
        if (!empty($settings['theme_button_text'])) {
            $currentTheme['button_text'] = $settings['theme_button_text'];
        }
        if (!empty($settings['theme_button_border'])) {
            $currentTheme['button_border'] = $settings['theme_button_border'];
        }
    @endphp

    <style>
        :root {
            --theme-primary: {{ $currentTheme['primary'] }};
            --theme-primary-hover: {{ $currentTheme['primary_hover'] ?? $currentTheme['primary'] }};
            --theme-primary-light: {{ $currentTheme['primary_light'] ?? 'rgba(124, 58, 237, 0.1)' }};
            --theme-primary-border: {{ $currentTheme['primary_border'] ?? 'rgba(124, 58, 237, 0.2)' }};
            --theme-card-bg: {{ $currentTheme['card_bg'] }};
            --theme-card-text: {{ $currentTheme['card_text'] }};
            --theme-card-border: {{ $currentTheme['card_border'] }};
            --theme-btn-bg: {{ $currentTheme['button_bg'] }};
            --theme-btn-text: {{ $currentTheme['button_text'] }};
            --theme-btn-border: {{ $currentTheme['button_border'] }};
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: {{ $currentTheme['bg_body'] }};
            background-image: 
                radial-gradient(ellipse 80% 60% at 50% -10%, {{ $currentTheme['glow1'] ?? 'rgba(124, 58, 237, 0.08)' }}, transparent 70%),
                radial-gradient(ellipse 60% 50% at 50% 110%, {{ $currentTheme['glow2'] ?? 'rgba(99, 102, 241, 0.08)' }}, transparent 70%),
                linear-gradient(45deg, rgba(255, 255, 255, 0.015) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(255, 255, 255, 0.015) 25%, transparent 25%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.015) 25%, transparent 25%),
                linear-gradient(-135deg, rgba(255, 255, 255, 0.015) 25%, transparent 25%),
                repeating-linear-gradient(0deg, rgba(255, 255, 255, 0.01) 0px, rgba(255, 255, 255, 0.01) 1px, transparent 1px, transparent 4px),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.01) 0px, rgba(255, 255, 255, 0.01) 1px, transparent 1px, transparent 4px);
            background-size: 100% 100%, 100% 100%, 12px 12px, 12px 12px, 12px 12px, 12px 12px, 4px 4px, 4px 4px;
            background-attachment: fixed;
            -webkit-tap-highlight-color: transparent;
        }
        .font-display {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .min-screen-h {
            min-height: 100vh;
            min-height: 100dvh;
        }
        .theme-primary-text {
            color: var(--theme-primary) !important;
        }
        .theme-primary-bg {
            background-color: var(--theme-primary) !important;
        }
        .theme-primary-border {
            border-color: var(--theme-primary-border) !important;
        }
        .theme-primary-light-bg {
            background-color: var(--theme-primary-light) !important;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800 antialiased selection:bg-purple-600 selection:text-white"
      x-data="{
          activeSlide: 0,
          totalSlides: {{ count($slides) }},
          touchStartX: 0,
          touchEndX: 0,
          inquiryModalOpen: false,
          detailModalOpen: false,
          activeDetail: { title: '', badge: '', subtitle: '', content: '' },
          toast: { show: false, message: '' },
          form: {
              name: '',
              company: '',
              phone: '',
              interest: 'Kavling Industri Siap Bangun',
              message: ''
          },
          
          nextSlide() {
              if (this.activeSlide < this.totalSlides - 1) {
                  this.activeSlide++;
              } else {
                  this.activeSlide = 0;
              }
              this.$nextTick(() => window.refreshIcons && window.refreshIcons());
          },
          prevSlide() {
              if (this.activeSlide > 0) {
                  this.activeSlide--;
              } else {
                  this.activeSlide = this.totalSlides - 1;
              }
              this.$nextTick(() => window.refreshIcons && window.refreshIcons());
          },
          goToSlide(index) {
              this.activeSlide = index;
              this.$nextTick(() => window.refreshIcons && window.refreshIcons());
          },
          handleTouchStart(e) {
              this.touchStartX = e.changedTouches[0].screenX;
          },
          handleTouchEnd(e) {
              this.touchEndX = e.changedTouches[0].screenX;
              this.handleGesture();
          },
          handleGesture() {
              const threshold = 40;
              if (this.touchEndX < this.touchStartX - threshold) {
                  this.nextSlide();
              }
              if (this.touchEndX > this.touchStartX + threshold) {
                  this.prevSlide();
              }
          },
          openInquiry(interest = '') {
              if (interest) this.form.interest = interest;
              this.inquiryModalOpen = true;
          },
          openDetail(title, badge, subtitle, content) {
              this.activeDetail = { title, badge, subtitle, content };
              this.detailModalOpen = true;
          },
          showToast(msg) {
              this.toast.message = msg;
              this.toast.show = true;
              setTimeout(() => this.toast.show = false, 4000);
          },
          sendToWhatsApp() {
              if (!this.form.name || !this.form.phone) {
                  alert('Mohon isi nama dan nomor telepon Anda.');
                  return;
              }
              const text = `Halo Tim Marketing KIW,%0ANama: ${encodeURIComponent(this.form.name)}%0APerusahaan: ${encodeURIComponent(this.form.company || '-')}%0ANo. Kontak: ${encodeURIComponent(this.form.phone)}%0AKebutuhan: ${encodeURIComponent(this.form.interest)}%0ACatatan: ${encodeURIComponent(this.form.message || '-')}`;
              const waUrl = `https://wa.me/{{ $settings['whatsapp'] ?? '628112345678' }}?text=${text}`;
              window.open(waUrl, '_blank');
              this.inquiryModalOpen = false;
              this.showToast('Menghubungkan ke WhatsApp Marketing KIW...');
          },
          sharePage() {
              if (navigator.share) {
                  navigator.share({
                      title: '{{ $settings['short'] ?? 'KIW Commercial' }}',
                      text: 'Hubungi Marketing & Cek Informasi Kawasan Industri Wijayakusuma:',
                      url: window.location.href
                  }).catch(() => {});
              } else {
                  navigator.clipboard.writeText(window.location.href);
                  this.showToast('Link berhasil disalin ke clipboard!');
              }
          }
      }">

    <!-- Main Container: Stack of Distinct Cards with Spacing (Milkshake Style) -->
    <main class="w-full min-h-screen flex flex-col items-center justify-start py-8 md:py-14 px-4 relative z-10">
        <div class="w-full max-w-[440px] space-y-7 md:space-y-8">

            <!-- STACKED SLIDE CARDS (Tiap slide menjadi kartu terpisah dengan jarak) -->
            @foreach($slides as $slideIndex => $slide)
                @php
                    $bannerGrads = [
                        0 => 'from-blue-900 via-indigo-950 to-slate-900',
                        1 => 'from-slate-900 via-sky-950 to-blue-950',
                        2 => 'from-indigo-950 via-purple-950 to-slate-900',
                    ];
                    $bannerIcons = [
                        0 => 'globe',
                        1 => 'message-circle',
                        2 => 'building-2',
                    ];

                    $cardBgColor = !empty($slide['card_bg']) ? $slide['card_bg'] : $currentTheme['card_bg'];
                    $cardTextColor = !empty($slide['card_text']) ? $slide['card_text'] : $currentTheme['card_text'];
                @endphp

                <div class="w-full {{ $currentTheme['card_radius'] ?? 'rounded-[28px] md:rounded-[32px]' }} shadow-2xl border overflow-hidden backdrop-blur-md transition-all duration-200 hover:shadow-sky-500/5"
                     style="border-color: {{ $currentTheme['card_border'] }}; background-color: {{ $cardBgColor }}; color: {{ $cardTextColor }};">
                    
                    @if($slideIndex === 0)
                        <!-- BANNER KARTU 1: Logo & Brand Profile Header KIW Terintegrasi -->
                        <div class="w-full pt-8 pb-6 px-6 bg-gradient-to-r {{ $slide['banner_grad'] ?? ($bannerGrads[0]) }} text-white relative overflow-hidden flex flex-col items-center text-center border-b border-white/10 select-none">
                            <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 pointer-events-none"></div>
                            <div class="absolute -left-8 -top-8 w-28 h-28 rounded-full bg-sky-400/10 pointer-events-none"></div>

                            <!-- Architectural Badge Logo KIW -->
                            <div class="w-20 h-20 rounded-2xl p-[1.5px] bg-gradient-to-tr {{ $currentTheme['accent_grad'] }} shadow-xl mb-3 flex items-center justify-center transition-transform duration-200 hover:scale-105 relative z-10">
                                <div class="w-full h-full rounded-[14px] bg-white flex items-center justify-center p-2.5 relative overflow-hidden shadow-inner">
                                    <img src="{{ asset($settings['logo'] ?? 'assets/logo kiw.png') }}" 
                                         alt="{{ $settings['name'] ?? 'KIW Logo' }}" 
                                         class="w-full h-full object-contain filter drop-shadow-sm select-none" />
                                </div>
                            </div>

                            <!-- Judul Utama & Tagline Brand -->
                            <h1 class="font-display text-xl font-bold tracking-tight leading-tight text-white relative z-10">
                                {{ $settings['short'] ?? 'KIW COMMERCIAL' }}
                            </h1>
                            <p class="text-xs text-sky-200/90 mt-1 max-w-[280px] leading-relaxed relative z-10">
                                {{ $settings['tagline'] ?? 'Integrated & Sustainable Industrial Estate' }}
                            </p>
                        </div>
                    @else
                        <!-- BANNER KARTU 2 & SETERUSNYA (Gambar Full atau Banner Gradient Elegan) -->
                        @if(!empty($slide['banner_image']))
                            <div class="w-full h-40 sm:h-48 overflow-hidden relative">
                                <img src="{{ asset($slide['banner_image']) }}" alt="{{ $slide['title'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>
                            </div>
                        @else
                            <div class="w-full p-4 sm:p-5 bg-gradient-to-r {{ $slide['banner_grad'] ?? ($bannerGrads[$slideIndex % 3]) }} text-white relative overflow-hidden flex items-center gap-3.5 border-b border-white/10">
                                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-white/5 pointer-events-none"></div>
                                <div class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center shrink-0 shadow-inner">
                                    <i data-lucide="{{ $slide['banner_icon'] ?? ($bannerIcons[$slideIndex % 3]) }}" class="w-5 h-5 text-sky-300"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="inline-block px-1.5 py-0.5 rounded text-[9px] font-bold tracking-widest bg-white/20 text-sky-200 uppercase mb-0.5">
                                        {{ $slide['nav_label'] ?? ('BAGIAN ' . ($slideIndex + 1)) }}
                                    </span>
                                    <h3 class="font-display font-bold text-sm sm:text-base text-white tracking-wide truncate">
                                        {{ $slide['title'] }}
                                    </h3>
                                </div>
                            </div>
                        @endif
                    @endif

                    <!-- CARD BODY: JUDUL & TOMBOL SIMPEL (Tanpa banyak kata-kata) -->
                    <div class="p-5 sm:p-6 space-y-3.5">
                        
                        <!-- Header / Section Title di dalam card -->
                        <div class="text-center pb-1">
                            <h2 class="font-display font-bold text-xs uppercase tracking-[0.25em]"
                                style="color: {{ $cardTextColor }}; opacity: 0.85;">
                                {{ $slide['title'] }}
                            </h2>
                        </div>

                        <!-- DAFTAR TOMBOL SIMPEL (Sesuai Konfigurasi Tombol Kartu) -->
                        <div class="space-y-3">
                            @foreach($slide['items'] as $item)
                                @if(($item['action_type'] ?? '') === 'whatsapp')
                                    <!-- WhatsApp -->
                                    <a href="{{ $item['url'] }}" target="_blank"
                                       class="group block w-full py-4 px-4 rounded-xl border text-center font-display font-medium text-[13.5px] sm:text-sm tracking-wide transition-all duration-200 active:scale-[0.99] shadow-xs cursor-pointer hover:opacity-90"
                                       style="background-color: {{ $currentTheme['button_bg'] }}; color: {{ $currentTheme['button_text'] }}; border-color: {{ $currentTheme['button_border'] }};">
                                        {{ $item['title'] }}
                                    </a>

                                @elseif(($item['action_type'] ?? '') === 'modal_inquiry')
                                    <!-- Booking / Inquiry Modal -->
                                    <button @click="openInquiry('{{ $item['title'] }}')"
                                            class="group block w-full py-4 px-4 rounded-xl border text-center font-display font-medium text-[13.5px] sm:text-sm tracking-wide transition-all duration-200 active:scale-[0.99] shadow-xs cursor-pointer hover:opacity-90"
                                            style="background-color: {{ $currentTheme['button_bg'] }}; color: {{ $currentTheme['button_text'] }}; border-color: {{ $currentTheme['button_border'] }};">
                                        {{ $item['title'] }}
                                    </button>

                                @elseif(($item['action_type'] ?? '') === 'call')
                                    <!-- Call -->
                                    <a href="{{ $item['url'] }}"
                                       class="group block w-full py-4 px-4 rounded-xl border text-center font-display font-medium text-[13.5px] sm:text-sm tracking-wide transition-all duration-200 active:scale-[0.99] shadow-xs cursor-pointer hover:opacity-90"
                                       style="background-color: {{ $currentTheme['button_bg'] }}; color: {{ $currentTheme['button_text'] }}; border-color: {{ $currentTheme['button_border'] }};">
                                        {{ $item['title'] }}
                                    </a>

                                @elseif(($item['action_type'] ?? '') === 'modal_detail')
                                    <!-- Detail Modal -->
                                    <button @click="openDetail('{{ addslashes($item['title']) }}', '{{ addslashes($item['badge'] ?? '') }}', '{{ addslashes($item['subtitle'] ?? '') }}', '{{ addslashes($item['detail_content'] ?? '') }}')"
                                            class="group block w-full py-4 px-4 rounded-xl border text-center font-display font-medium text-[13.5px] sm:text-sm tracking-wide transition-all duration-200 active:scale-[0.99] shadow-xs cursor-pointer hover:opacity-90"
                                            style="background-color: {{ $currentTheme['button_bg'] }}; color: {{ $currentTheme['button_text'] }}; border-color: {{ $currentTheme['button_border'] }};">
                                        {{ $item['title'] }}
                                    </button>

                                @else
                                    <!-- Maps / External Link -->
                                    <a href="{{ $item['url'] }}" target="_blank"
                                       class="group block w-full py-4 px-4 rounded-xl border text-center font-display font-medium text-[13.5px] sm:text-sm tracking-wide transition-all duration-200 active:scale-[0.99] shadow-xs cursor-pointer hover:opacity-90"
                                       style="background-color: {{ $currentTheme['button_bg'] }}; color: {{ $currentTheme['button_text'] }}; border-color: {{ $currentTheme['button_border'] }};">
                                        {{ $item['title'] }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach

            <!-- CLEAN FOOTER -->
            <div class="text-center pt-2 pb-8 select-none">
                <a href="{{ route('admin.dashboard') }}" title="Panel Admin" class="text-[10px] tracking-widest font-mono uppercase text-slate-400 hover:text-sky-300 hover:underline transition-colors">
                    {{ $settings['footer_badge'] ?? 'KIW COMMERCIAL • INDUSTRIAL ESTATE' }}
                </a>
            </div>

        </div>
    </main>

    <!-- INQUIRY / BOOKING MODAL (Direct to WhatsApp) -->
    <div x-show="inquiryModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm"
         style="display: none;"
         @keydown.escape.window="inquiryModalOpen = false">

        <div @click.outside="inquiryModalOpen = false"
             class="w-full max-w-md bg-white border border-slate-200 text-slate-800 rounded-2xl shadow-2xl p-6 relative max-h-[90vh] overflow-y-auto">
            
            <button @click="inquiryModalOpen = false" class="absolute top-4 right-4 p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <div class="text-left mb-5">
                <span class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold theme-primary-light-bg theme-primary-text mb-2">
                    Official KIW Booking
                </span>
                <h3 class="font-display text-lg font-bold text-slate-900">Jadwalkan Survei / Konsultasi</h3>
                <p class="text-xs text-slate-500 mt-1">
                    Silakan isi data kebutuhan kavling/bangunan pabrik Anda. Tim representatif KIW akan segera membalas via WhatsApp.
                </p>
            </div>

            <form @submit.prevent="sendToWhatsApp()" class="space-y-3.5 text-left text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap *</label>
                    <input type="text" x-model="form.name" required placeholder="Contoh: Budi Santoso"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all text-xs">
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nama Perusahaan / Bisnis</label>
                    <input type="text" x-model="form.company" placeholder="Contoh: PT Manufaktur Bersama"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all text-xs">
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nomor WhatsApp Aktif *</label>
                    <input type="tel" x-model="form.phone" required placeholder="Contoh: 0812-3456-7890"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all text-xs">
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Pilihan Unit / Minat Fasilitas</label>
                    <select x-model="form.interest"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all text-xs">
                        <option value="Kavling Industri Siap Bangun">Kavling Industri Siap Bangun (1 - 10 Ha)</option>
                        <option value="Sewa Bangunan Pabrik Siap Pakai (SFB)">Sewa Bangunan Pabrik Siap Pakai (SFB)</option>
                        <option value="Gudang Komersial & Pusat Distribusi">Gudang Komersial & Pusat Distribusi</option>
                        <option value="Fasilitas KLIK (BKPM) & Perizinan">Fasilitas KLIK (BKPM) & Perizinan</option>
                        <option value="Jadwal Survei Lapangan Langsung">Jadwal Survei Lapangan Langsung</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Catatan Tambahan / Luas yang Dibutuhkan</label>
                    <textarea x-model="form.message" rows="2" placeholder="Tuliskan estimasi luas lahan atau kebutuhan daya listrik industri Anda..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all text-xs"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3 px-4 rounded-xl theme-primary-bg text-white font-bold text-xs transition-all shadow-md active:scale-[0.98] flex items-center justify-center gap-2 cursor-pointer hover:opacity-90">
                        <i data-lucide="send" class="w-4 h-4"></i>
                        <span>Kirim Permintaan ke WhatsApp Official</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- DETAIL MODAL (Spesifikasi Unit & Informasi Fasilitas) -->
    <div x-show="detailModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm"
         style="display: none;"
         @keydown.escape.window="detailModalOpen = false">

        <div @click.outside="detailModalOpen = false"
             class="w-full max-w-md bg-white border border-slate-200 text-slate-800 rounded-2xl shadow-2xl p-6 relative max-h-[85vh] overflow-y-auto">
            
            <button @click="detailModalOpen = false" class="absolute top-4 right-4 p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <div class="text-left">
                <div class="flex items-center gap-2 mb-2">
                    <span class="inline-block px-2 py-0.5 rounded-md text-[10px] font-bold theme-primary-light-bg theme-primary-text" x-text="activeDetail.badge || 'Spesifikasi'"></span>
                    <span class="text-[10px] text-slate-400 font-semibold tracking-wider uppercase">KIW COMMERCIAL ESTATE</span>
                </div>
                <h3 class="font-display text-lg font-bold text-slate-900 leading-tight" x-text="activeDetail.title"></h3>
                <p class="text-xs text-slate-500 mt-1 font-medium" x-text="activeDetail.subtitle"></p>

                <div class="mt-4 pt-4 border-t border-slate-100 text-xs text-slate-600 leading-relaxed space-y-3" x-html="activeDetail.content"></div>

                <div class="mt-6 flex items-center gap-2">
                    <button @click="detailModalOpen = false; openInquiry(activeDetail.title)"
                            class="flex-1 py-2.5 px-3 rounded-xl theme-primary-bg text-white font-semibold text-xs transition-colors flex items-center justify-center gap-1.5 hover:opacity-90">
                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        <span>Jadwalkan Survei</span>
                    </button>
                    <a :href="'https://wa.me/{{ $settings['whatsapp'] ?? '628112345678' }}?text=Halo%20Marketing%20KIW,%20saya%20ingin%20tanya%20detail%20mengenai%20' + encodeURIComponent(activeDetail.title)"
                       target="_blank"
                       class="py-2.5 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition-colors flex items-center justify-center gap-1.5">
                        <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div x-show="toast.show"
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0 translate-y-3 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-3 scale-95"
         class="fixed bottom-6 z-50 px-4 py-2.5 rounded-full bg-slate-900/95 text-white text-xs font-semibold shadow-2xl flex items-center gap-2 border border-slate-700/80"
         style="display: none;">
        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>
        <span x-text="toast.message"></span>
    </div>

</body>
</html>
