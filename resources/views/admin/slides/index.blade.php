@extends('layouts.admin')

@section('title', 'Atur Kartu (Cards)')
@section('header_title', 'Kelola Kartu Landing Page')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold font-display text-slate-900">Daftar Kartu Landing Page</h1>
            <p class="text-xs text-slate-500 mt-1">Setiap kartu mewakili 1 bagian / kelompok layanan yang tampil bertumpuk (stacked cards) pada halaman utama.</p>
        </div>
        <a href="{{ route('admin.slides.create') }}"
           class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20 flex items-center gap-2 self-start sm:self-auto cursor-pointer">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Kartu Baru</span>
        </a>
    </div>

    <!-- Cards Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50/70 border-b border-slate-100 text-slate-500 font-semibold uppercase tracking-wider text-[11px]">
                    <tr>
                        <th class="py-3.5 px-6 w-16 text-center">Urutan</th>
                        <th class="py-3.5 px-6">Judul Kartu</th>
                        <th class="py-3.5 px-6">Header / Banner</th>
                        <th class="py-3.5 px-6 text-center">Jumlah Tombol</th>
                        <th class="py-3.5 px-6 text-center">Status</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($slides as $slide)
                        <tr class="hover:bg-blue-50/20 transition-colors">
                            <td class="py-4 px-6 text-center">
                                <span class="inline-block w-8 h-8 rounded-xl bg-blue-50 text-blue-700 font-bold leading-8 text-xs font-mono">
                                    #{{ $slide->order }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-sm font-display">{{ $slide->title }}</div>
                                <div class="text-[11px] text-blue-600 font-semibold mt-0.5">{{ $slide->subtitle }}</div>
                                <div class="text-[10px] text-slate-400 mt-1">Label: {{ $slide->nav_label }}</div>
                            </td>
                            <td class="py-4 px-6">
                                @if(!empty($slide->banner_image))
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset($slide->banner_image) }}" alt="Banner" class="w-10 h-8 rounded-lg object-cover border border-slate-200">
                                        <span class="text-[11px] font-semibold text-slate-700">Gambar Banner</span>
                                    </div>
                                @elseif($loop->first)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 font-semibold text-[11px]">
                                        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                                        <span>Header Profil Resmi KIW</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-medium text-[11px]">
                                        <i data-lucide="palette" class="w-3.5 h-3.5"></i>
                                        <span>Gradasi Warna Tema</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="inline-block px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                    {{ $slide->items_count }} Tombol
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($slide->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Aktif</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        <span>Nonaktif</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('admin.slides.items.create', $slide) }}"
                                       class="p-2 rounded-lg text-emerald-600 hover:bg-emerald-50 transition-colors" title="Tambah Tombol ke Kartu Ini">
                                        <i data-lucide="plus-circle" class="w-4 h-4"></i>
                                    </a>
                                    <a href="{{ route('admin.slides.edit', $slide) }}"
                                       class="p-2 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors" title="Edit Kartu & Kelola Tombol">
                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus kartu ini beserta seluruh tombol di dalamnya?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer" title="Hapus Kartu">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada kartu landing page yang dibuat. Silakan tambahkan kartu baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
