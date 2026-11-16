@extends('layouts.admin')

@section('title', 'Edit Tombol: ' . $item->title)
@section('header_title', 'Edit Tombol Layanan')

@section('content')
<div class="max-w-3xl space-y-6">

    <div class="flex items-center gap-2 text-xs text-slate-500">
        <a href="{{ route('admin.slides.index') }}" class="hover:text-blue-700">Daftar Kartu</a>
        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
        <a href="{{ route('admin.slides.edit', $item->slide_id) }}" class="hover:text-blue-700">{{ $item->slide->title ?? 'Kartu' }}</a>
        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
        <span class="text-slate-800 font-semibold">{{ $item->title }}</span>
    </div>

    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs">
        <div class="mb-6 pb-4 border-b border-slate-100">
            <h1 class="text-lg font-bold font-display text-slate-900">Edit Tombol Layanan</h1>
            <p class="text-xs text-slate-500 mt-0.5">Perbarui nama, tautan, atau aksi modal dari tombol ini.</p>
        </div>

        <form action="{{ route('admin.items.update', $item) }}" method="POST" class="space-y-5" x-data="{ actionType: '{{ old('action_type', $item->action_type) }}' }">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul Tombol / Nama Layanan *</label>
                <input type="text" name="title" value="{{ old('title', $item->title) }}" required
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Deskripsi Singkat / Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $item->subtitle) }}"
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Tipe Aksi Tombol *</label>
                    <select name="action_type" x-model="actionType" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                        <option value="whatsapp">Hubungi via WhatsApp Langsung</option>
                        <option value="modal_inquiry">Buka Formulir Survei / Booking</option>
                        <option value="modal_detail">Buka Modal Informasi Lengkap</option>
                        <option value="call">Panggilan Telepon (tel:)</option>
                        <option value="map">Buka Google Maps Rute</option>
                        <option value="link">Buka URL Link Eksternal</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Label Badge (Opsional)</label>
                    <input type="text" name="badge" value="{{ old('badge', $item->badge) }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>
            </div>

            <!-- URL input for WhatsApp/Map/Link/Call -->
            <div x-show="actionType !== 'modal_inquiry' && actionType !== 'modal_detail'">
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">URL Target / Nomor</label>
                <input type="text" name="url" value="{{ old('url', $item->url) }}"
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
            </div>

            <!-- Detail content input for modal_detail -->
            <div x-show="actionType === 'modal_detail'" style="display: none;">
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Isi Penjelasan Lengkap (Pop-Up Detail)</label>
                <textarea name="detail_content" rows="4"
                          class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-sm text-slate-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">{{ old('detail_content', $item->detail_content) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nomor Urutan Tampilan *</label>
                    <input type="number" name="order" value="{{ old('order', $item->order) }}" min="1" required
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Icon Lucide (Opsional)</label>
                    <input type="text" name="icon" value="{{ old('icon', $item->icon) }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 font-mono focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2.5 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}
                           class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-4 h-4">
                    <span class="text-xs font-semibold text-slate-700">Tampilkan Tombol Ini di Halaman Depan</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.slides.edit', $item->slide_id) }}" class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-100 text-xs font-semibold text-slate-700 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20 active:scale-[0.99] flex items-center gap-2 cursor-pointer">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Simpan Perubahan Tombol</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
