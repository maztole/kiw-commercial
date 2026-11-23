@extends('layouts.admin')

@section('title', 'Atur Tombol: ' . $slide->title)
@section('header_title', 'Kelola Tombol Kartu')

@section('content')
<div class="space-y-6">

    <!-- Breadcrumb & Top Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-2 text-xs text-slate-500">
            <a href="{{ route('admin.slides.index') }}" class="hover:text-blue-700">Daftar Kartu</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-slate-800 font-semibold">{{ $slide->title }}</span>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-blue-700 font-semibold">Atur Tombol</span>
        </div>

        <div class="flex items-center gap-2 self-start sm:self-auto">
            <a href="{{ route('admin.slides.edit', $slide) }}"
               class="px-3.5 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-semibold text-slate-700 transition-colors inline-flex items-center gap-1.5 shadow-2xs">
                <i data-lucide="edit-3" class="w-3.5 h-3.5 text-slate-500"></i>
                <span>Edit Judul Kartu</span>
            </a>
            <a href="{{ route('admin.slides.index') }}"
               class="px-3.5 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-semibold text-slate-700 transition-colors inline-flex items-center gap-1.5 shadow-2xs">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5 text-slate-500"></i>
                <span>Kembali ke Daftar Kartu</span>
            </a>
        </div>
    </div>

    <!-- CARD ITEMS / BUTTONS LIST PANEL (Exact Image 2) -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-100">
            <div>
                <h1 class="text-lg font-bold font-display text-slate-900">Tombol / Link Layanan pada Kartu Ini</h1>
                <p class="text-xs text-slate-500 mt-0.5">Daftar item tombol yang muncul di kartu ketika pengunjung membuka halaman ini.</p>
            </div>
            <a href="{{ route('admin.slides.items.create', $slide) }}"
               class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20 flex items-center gap-2 self-start sm:self-auto cursor-pointer">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Tombol Baru</span>
            </a>
        </div>

        <div class="space-y-3">
            @forelse($slide->items as $item)
                <div class="p-4 rounded-2xl border border-slate-200/90 hover:border-blue-300 bg-white hover:bg-blue-50/20 transition-all flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-700 font-bold flex items-center justify-center text-xs shrink-0 font-mono">
                            {{ $item->order }}
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-bold text-slate-900 text-sm font-display">{{ $item->title }}</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-600">
                                    {{ strtoupper($item->action_type) }}
                                </span>
                                @if(!$item->is_active)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-rose-50 text-rose-600 border border-rose-200">
                                        Nonaktif
                                    </span>
                                @endif
                            </div>
                            @if($item->url)
                                <p class="text-[11px] text-blue-600 font-mono mt-0.5 truncate max-w-xl">{{ $item->url }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('admin.items.edit', $item) }}"
                           class="p-2 rounded-xl text-blue-600 hover:bg-blue-50 border border-transparent hover:border-blue-100 transition-colors"
                           title="Edit Tombol">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.items.destroy', $item) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus tombol ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="p-2 rounded-xl text-rose-600 hover:bg-rose-50 border border-transparent hover:border-rose-100 transition-colors cursor-pointer"
                                    title="Hapus Tombol">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 px-4 rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50/50">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="layers" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-sm font-bold text-slate-800">Belum Ada Tombol di Kartu Ini</h3>
                    <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">Tambahkan link website, nomor WhatsApp, nomor telepon, atau maps untuk ditampilkan pada kartu ini.</p>
                    <a href="{{ route('admin.slides.items.create', $slide) }}"
                       class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-sm">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>Tambah Tombol Baru</span>
                    </a>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
