@extends('layouts.admin')

@section('title', 'Edit Judul Kartu: ' . $slide->title)
@section('header_title', 'Edit Judul Kartu')

@section('content')
<div class="space-y-6">

    <!-- Breadcrumb & Top Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-2 text-xs text-slate-500">
            <a href="{{ route('admin.slides.index') }}" class="hover:text-blue-700">Daftar Kartu</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-slate-800 font-semibold">{{ $slide->title }}</span>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-blue-700 font-semibold">Edit Judul</span>
        </div>

        <div class="flex items-center gap-2 self-start sm:self-auto">
            <a href="{{ route('admin.slides.items.index', $slide) }}"
               class="px-3.5 py-2 rounded-xl bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white border border-blue-200 transition-all text-xs font-bold inline-flex items-center gap-1.5 shadow-2xs">
                <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                <span>Atur Tombol ({{ $slide->items()->count() }})</span>
            </a>
            <a href="{{ route('admin.slides.index') }}"
               class="px-3.5 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-semibold text-slate-700 transition-colors inline-flex items-center gap-1.5 shadow-2xs">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5 text-slate-500"></i>
                <span>Kembali ke Daftar Kartu</span>
            </a>
        </div>
    </div>

    <!-- PENGATURAN KARTU FORM (Exact Image 1) -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs">
        <div class="mb-6 pb-4 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h1 class="text-lg font-bold font-display text-slate-900">Pengaturan Kartu</h1>
                <p class="text-xs text-slate-500 mt-0.5">Edit nama judul kartu, nomor urutan, serta subjudul kartu.</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $slide->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">
                {{ $slide->is_active ? 'Kartu Aktif' : 'Kartu Nonaktif' }}
            </span>
        </div>

        <form action="{{ route('admin.slides.update', $slide) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul Kartu *</label>
                    <input type="text" name="title" value="{{ old('title', $slide->title) }}" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <span class="text-[11px] text-slate-400">Judul utama kelompok kartu di layar HP.</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nomor Urutan Tampilan *</label>
                    <input type="number" name="order" value="{{ old('order', $slide->order) }}" min="1" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <span class="text-[11px] text-slate-400">Urutan kartu saat digeser (1 = kartu pertama).</span>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Subjudul Kartu (Opsional)</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $slide->subtitle) }}" placeholder="Contoh: Informasi Resmi Perseroan"
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                <span class="text-[11px] text-slate-400">Teks petunjuk atau deskripsi kecil di bawah judul kartu.</span>
            </div>

            <!-- Hidden Inputs to preserve existing configuration safely -->
            <input type="hidden" name="nav_label" value="{{ old('nav_label', $slide->nav_label ?? $slide->title) }}">
            <input type="hidden" name="card_bg" value="{{ $slide->card_bg ?? '' }}">
            <input type="hidden" name="card_text" value="{{ $slide->card_text ?? '' }}">
            <input type="hidden" name="banner_image" value="{{ $slide->banner_image ?? '' }}">

            <div class="pt-2">
                <label class="flex items-center gap-2.5 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}
                           class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                    <span class="text-xs font-semibold text-slate-700">Aktifkan Kartu Ini (Ditampilkan ke Pengunjung)</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.slides.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-100 text-xs font-semibold text-slate-700 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20 active:scale-[0.99] flex items-center gap-2 cursor-pointer">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Simpan Perubahan Kartu</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
