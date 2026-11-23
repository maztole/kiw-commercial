@extends('layouts.admin')

@section('title', 'Tambah Kartu Baru')
@section('header_title', 'Tambah Kartu Baru')

@section('content')
<div class="max-w-3xl space-y-6">

    <div class="flex items-center gap-2 text-xs text-slate-500">
        <a href="{{ route('admin.slides.index') }}" class="hover:text-blue-700">Daftar Kartu</a>
        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
        <span class="text-slate-800 font-semibold">Tambah Kartu Baru</span>
    </div>

    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs">
        <div class="mb-6 pb-4 border-b border-slate-100">
            <h1 class="text-lg font-bold font-display text-slate-900">Informasi Kartu Baru</h1>
            <p class="text-xs text-slate-500 mt-0.5">Tentukan judul, subjudul, banner gambar opsional, dan urutan kartu.</p>
        </div>

        <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul Kartu *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: FASILITAS & UNIT KAWASAN"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <span class="text-[11px] text-slate-400">Judul kelompok kartu yang tampil kepada pengunjung.</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nomor Urutan Tampilan *</label>
                    <input type="number" name="order" value="{{ old('order', $nextOrder) }}" min="1" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <span class="text-[11px] text-slate-400">Urutan kartu saat digeser (1 = kartu pertama).</span>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Subjudul Kartu (Opsional)</label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Contoh: Layanan Sewa SFB & Kavling Industri Siap Bangun"
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                <span class="text-[11px] text-slate-400">Deskripsi singkat atau petunjuk di bawah judul kartu.</span>
            </div>

            <!-- Hidden Inputs for backwards compatibility -->
            <input type="hidden" name="nav_label" value="{{ old('nav_label') }}">

            <div class="pt-2">
                <label class="flex items-center gap-2.5 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                    <span class="text-xs font-semibold text-slate-700">Aktifkan Kartu Ini (Langsung Tampil ke Pengunjung)</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.slides.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-100 text-xs font-semibold text-slate-700 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20 active:scale-[0.99] flex items-center gap-2 cursor-pointer">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Simpan Kartu Baru</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
