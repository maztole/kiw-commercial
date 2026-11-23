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
            <table class="w-full text-left text-xs table-fixed min-w-[700px]">
                <thead class="bg-slate-50/70 border-b border-slate-100 text-slate-500 font-semibold uppercase tracking-wider text-[11px]">
                    <tr>
                        <th class="py-3.5 px-6 w-[12%] text-center">Urutan</th>
                        <th class="py-3.5 px-6 w-[44%] text-left">Judul Kartu</th>
                        <th class="py-3.5 px-6 w-[24%] text-center">Status</th>
                        <th class="py-3.5 px-6 w-[20%] text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($slides as $slide)
                        <tr class="hover:bg-blue-50/20 transition-colors">
                            <td class="py-4 px-6 text-center align-middle">
                                <span class="inline-block w-8 h-8 rounded-xl bg-blue-50 text-blue-700 font-bold leading-8 text-xs font-mono">
                                    {{ $slide->order }}
                                </span>
                            </td>
                            <td class="py-4 px-6 align-middle">
                                <div class="font-bold text-slate-900 text-sm font-display">{{ $slide->title }}</div>
                                @if($slide->subtitle)
                                    <div class="text-[11px] text-slate-500 mt-0.5 truncate">{{ $slide->subtitle }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center align-middle">
                                @if($slide->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Aktif</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        <span>Nonaktif</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center align-middle">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- 1. Ikon Edit Judul Kartu -->
                                    <a href="{{ route('admin.slides.edit', $slide) }}"
                                       class="w-8 h-8 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 text-slate-600 hover:text-slate-900 transition-all shadow-2xs flex items-center justify-center"
                                       title="Edit Judul Kartu">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>

                                    <!-- 2. Ikon Atur Tombol Layanan -->
                                    <a href="{{ route('admin.slides.items.index', $slide) }}"
                                       class="w-8 h-8 rounded-xl border border-blue-200 bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white transition-all shadow-2xs flex items-center justify-center relative group"
                                       title="Atur Tombol Layanan ({{ $slide->items_count }})">
                                        <i data-lucide="layers" class="w-4 h-4"></i>
                                    </a>

                                    <!-- 3. Ikon Hapus Kartu -->
                                    <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus kartu ini beserta seluruh tombol di dalamnya?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-8 h-8 rounded-xl border border-transparent hover:border-rose-200 hover:bg-rose-50 text-slate-400 hover:text-rose-600 transition-colors flex items-center justify-center cursor-pointer"
                                                title="Hapus Kartu">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-400">
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
