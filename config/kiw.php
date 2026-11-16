<?php

return [
    /*
    |--------------------------------------------------------------------------
    | General Site & Brand Settings
    |--------------------------------------------------------------------------
    */
    'brand' => [
        'name' => 'PT Kawasan Industri Wijayakusuma',
        'short' => 'KIW COMMERCIAL',
        'tagline' => 'Integrated & Sustainable Industrial Estate',
        'phone' => '+62 24 8662156',
        'whatsapp' => '628112345678', // Format internasional tanpa simbol '+'
        'whatsapp_display' => '+62 811-2345-678',
        'email' => 'marketing@kiw.co.id',
        'address' => 'Jl. Raya Semarang - Kendal Km. 12, Semarang 50153, Jawa Tengah',
        'maps_url' => 'https://maps.google.com/?q=PT+Kawasan+Industri+Wijayakusuma',
        'website' => 'https://www.kiw.co.id',
        'logo' => 'assets/logo kiw.png',
        'footer_badge' => 'KIW COMMERCIAL • INDUSTRIAL ESTATE',
        
        'theme_bg' => '#0b1528',
        'theme_card' => '#111e38',
        'theme_primary' => '#0284c7',
        'theme_accent' => '#38bdf8',
        'theme_emerald' => '#10b981',
    ],

    /*
    |--------------------------------------------------------------------------
    | Multi-Card Landing Page Contents (2 Halaman / Kartu)
    |--------------------------------------------------------------------------
    | 1. Halaman Website & Profil PT KIW
    | 2. Halaman Kontak Person & Media Sosial Resmi
    */
    'slides' => [
        [
            'id' => 'profile',
            'title' => 'WEBSITE & PROFIL',
            'subtitle' => 'Informasi Resmi Perseroan',
            'nav_label' => 'Website & Profil',
            'banner_badge' => 'PROFIL PERUSAHAAN',
            'banner_title' => 'PT Kawasan Industri Wijayakusuma',
            'banner_desc' => 'Kawasan industri terintegrasi & berkelanjutan di Jawa Tengah',
            'banner_grad' => 'from-blue-900 via-indigo-950 to-slate-900',
            'banner_icon' => 'globe',
            'items' => [
                [
                    'title' => 'Website Resmi PT KIW',
                    'url' => 'https://www.kiw.co.id',
                    'action_type' => 'link',
                    'icon' => 'globe',
                ],
                [
                    'title' => 'Profil & Tentang Perusahaan',
                    'url' => 'https://www.kiw.co.id/tentang-kami',
                    'action_type' => 'link',
                    'icon' => 'building-2',
                ],
                [
                    'title' => 'Produk & Kawasan Industri',
                    'url' => 'https://www.kiw.co.id/fasilitas',
                    'action_type' => 'link',
                    'icon' => 'factory',
                ],
                [
                    'title' => 'Berita & Pengumuman Terbaru',
                    'url' => 'https://www.kiw.co.id/berita',
                    'action_type' => 'link',
                    'icon' => 'newspaper',
                ],
            ],
        ],

        [
            'id' => 'contact',
            'title' => 'KONTAK & MEDIA SOSIAL',
            'subtitle' => 'Hubungi & Terhubung dengan Kami',
            'nav_label' => 'Kontak & Sosmed',
            'banner_badge' => 'HUBUNGI KAMI',
            'banner_title' => 'Kontak Person & Media Sosial',
            'banner_desc' => 'WhatsApp marketing, telepon, dan saluran media sosial resmi',
            'banner_grad' => 'from-slate-900 via-sky-950 to-blue-950',
            'banner_icon' => 'message-circle',
            'items' => [
                [
                    'title' => 'WhatsApp Contact Person',
                    'url' => 'https://wa.me/628112345678?text=Halo%20KIW,%20saya%20ingin%20konsultasi%20mengenai%20Kawasan%20Industri%20Wijayakusuma.',
                    'action_type' => 'whatsapp',
                    'icon' => 'message-square',
                ],
                [
                    'title' => 'Instagram Resmi @kiw_industrial',
                    'url' => 'https://www.instagram.com/kiw_industrial/',
                    'action_type' => 'link',
                    'icon' => 'instagram',
                ],
                [
                    'title' => 'LinkedIn PT Kawasan Industri Wijayakusuma',
                    'url' => 'https://www.linkedin.com/company/pt-kawasan-industri-wijayakusuma/',
                    'action_type' => 'link',
                    'icon' => 'linkedin',
                ],
                [
                    'title' => 'Telepon Kantor (024) 8662156',
                    'url' => 'tel:+62248662156',
                    'action_type' => 'call',
                    'icon' => 'phone',
                ],
                [
                    'title' => 'Petunjuk Arah Google Maps',
                    'url' => 'https://maps.google.com/?q=PT+Kawasan+Industri+Wijayakusuma',
                    'action_type' => 'map',
                    'icon' => 'map-pin',
                ],
            ],
        ],
    ],
];
