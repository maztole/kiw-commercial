@extends('layouts.admin')

@section('title', 'Edit Kartu: ' . $slide->title)
@section('header_title', 'Edit Kartu & Kelola Tombol')

@section('content')
<div class="space-y-8">

    <div class="flex items-center gap-2 text-xs text-slate-500">
        <a href="{{ route('admin.slides.index') }}" class="hover:text-blue-700">Daftar Kartu</a>
        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
        <span class="text-slate-800 font-semibold">{{ $slide->title }}</span>
    </div>

    <!-- 1. CARD SETTINGS FORM -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs">
        <div class="mb-6 pb-4 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h1 class="text-lg font-bold font-display text-slate-900">Pengaturan Kartu</h1>
                <p class="text-xs text-slate-500 mt-0.5">Edit judul, subjudul, banner gambar, serta urutan tampilan kartu.</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $slide->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">
                {{ $slide->is_active ? 'Kartu Aktif' : 'Kartu Nonaktif' }}
            </span>
        </div>

        <form action="{{ route('admin.slides.update', $slide) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul Kartu *</label>
                <input type="text" name="title" value="{{ old('title', $slide->title) }}" required
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Subjudul Kartu *</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $slide->subtitle) }}" required
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Label Navigasi Menu *</label>
                    <input type="text" name="nav_label" value="{{ old('nav_label', $slide->nav_label) }}" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nomor Urutan Tampilan *</label>
                    <input type="number" name="order" value="{{ old('order', $slide->order) }}" min="1" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>
            </div>

            <!-- Card Banner Image -->
            <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 space-y-3">
                <label class="block text-xs font-semibold text-slate-700">Gambar Banner Header Kartu</label>
                @if(!empty($slide->banner_image))
                    <div class="flex items-center gap-4">
                        <div class="w-24 h-16 rounded-xl overflow-hidden border border-slate-200 bg-white shrink-0">
                            <img src="{{ asset($slide->banner_image) }}" alt="Banner" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer text-xs text-rose-600 font-semibold">
                                <input type="checkbox" name="remove_banner_image" value="1" class="rounded border-rose-300 text-rose-600 focus:ring-rose-500">
                                <span>Hapus gambar banner ini (kembali ke gradasi tema)</span>
                            </label>
                            <p class="text-[10px] text-slate-400 mt-0.5">Centang opsi ini untuk menghapus banner.</p>
                        </div>
                    </div>
                @endif
                <div>
                    <input type="file" name="banner_image_file" accept="image/*"
                           class="text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    <span class="block text-[11px] text-slate-400 mt-1">Upload gambar baru untuk mengganti banner kartu ini.</span>
                </div>
            </div>

            <!-- Optional Custom Colors -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Warna Background Kartu Khusus (Opsional)</label>
                    <input type="text" name="card_bg" value="{{ old('card_bg', $slide->card_bg) }}" placeholder="Default dari Tema Global"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500">
                    <span class="text-[10px] text-slate-400">Kosongkan untuk memakai warna kartu dari Tema Global.</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Warna Teks Kartu Khusus (Opsional)</label>
                    <input type="text" name="card_text" value="{{ old('card_text', $slide->card_text) }}" placeholder="Default dari Tema Global"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500">
                    <span class="text-[10px] text-slate-400">Kosongkan untuk memakai warna teks dari Tema Global.</span>
                </div>
            </div>

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

    <!-- 2. CARD ITEMS / BUTTONS LIST -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-100">
            <div>
                <h2 class="text-base font-bold font-display text-slate-900">Tombol / Link Layanan pada Kartu Ini</h2>
                <p class="text-xs text-slate-500 mt-0.5">Daftar item tombol yang muncul di kartu ketika pengunjung membuka halaman ini.</p>
            </div>
            <a href="{{ route('admin.slides.items.create', $slide) }}"
               class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20 flex items-center gap-2 self-start sm:self-auto cursor-pointer">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Tombol Baru</span>
            </a>
        </div>

        <div class="space-y-3">
            @forelse($slide->items as $item)
                <div class="p-4 rounded-2xl border border-slate-200/90 hover:border-blue-300 bg-white hover:bg-blue-50/20 transition-all flex items-start justify-between gap-4">
                    <div class="flex items-start gap-3.5">
                        <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-700 font-bold flex items-center justify-center text-xs shrink-0 mt-0.5">
                            #{{ $item->order }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-bold text-slate-900 text-sm font-display">{{ $item->title }}</span>
                                @if($item->badge)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                        {{ $item->badge }}
                                    </span>
                                @endif
                                <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-600">
                                    Tipe: {{ strtoupper($item->action_type) }}
                                </span>
                            </div>
                            @if($item->subtitle)
                                <p class="text-xs text-slate-500 mt-1">{{ $item->subtitle }}</p>
                            @endif
                            @if($item->url)
                                <p class="text-[11px] text-blue-600 font-mono mt-1 truncate max-w-md">{{ $item->url }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-1.5 shrink-0">
                        <a href="{{ route('admin.items.edit', $item) }}" class="p-2 rounded-lg text-blue-700 hover:bg-blue-50 transition-colors" title="Edit Tombol">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.items.destroy', $item) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus tombol ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer" title="Hapus Tombol">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-slate-400 text-xs">
                    Belum ada tombol di kartu ini. Klik "Tambah Tombol Baru" di atas.
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
