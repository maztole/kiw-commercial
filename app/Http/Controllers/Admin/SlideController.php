<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SlideController extends Controller
{
    public function index(): View
    {
        $slides = Slide::withCount('items')->orderBy('order')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create(): View
    {
        $nextOrder = (Slide::max('order') ?? 0) + 1;
        return view('admin.slides.create', compact('nextOrder'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:150',
            'banner_image' => 'nullable|string|max:255',
            'banner_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'banner_text' => 'nullable|string|max:255',
            'banner_grad' => 'nullable|string|max:100',
            'card_bg' => 'nullable|string|max:30',
            'card_text' => 'nullable|string|max:30',
            'nav_label' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'order' => 'required|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['nav_label'])) {
            $validated['nav_label'] = $validated['title'];
        }

        if ($request->hasFile('banner_image_file')) {
            $file = $request->file('banner_image_file');
            $filename = 'card_banner_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/banners'), $filename);
            $validated['banner_image'] = 'assets/banners/' . $filename;
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        unset($validated['banner_image_file']);

        Slide::create($validated);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Kartu berhasil ditambahkan!');
    }

    public function edit(Slide $slide): View
    {
        $slide->load(['items' => fn($q) => $q->orderBy('order')]);
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:150',
            'banner_image' => 'nullable|string|max:255',
            'banner_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'remove_banner_image' => 'nullable|boolean',
            'banner_text' => 'nullable|string|max:255',
            'banner_grad' => 'nullable|string|max:100',
            'card_bg' => 'nullable|string|max:30',
            'card_text' => 'nullable|string|max:30',
            'nav_label' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'order' => 'required|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['nav_label'])) {
            $validated['nav_label'] = $validated['title'];
        }

        if ($request->boolean('remove_banner_image')) {
            $validated['banner_image'] = null;
        } elseif ($request->hasFile('banner_image_file')) {
            $file = $request->file('banner_image_file');
            $filename = 'card_banner_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/banners'), $filename);
            $validated['banner_image'] = 'assets/banners/' . $filename;
        }

        $validated['is_active'] = $request->boolean('is_active');
        unset($validated['banner_image_file'], $validated['remove_banner_image']);

        $slide->update($validated);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Kartu "' . $slide->title . '" berhasil diperbarui!');
    }

    public function destroy(Slide $slide): RedirectResponse
    {
        $title = $slide->title;
        $slide->items()->delete();
        $slide->delete();

        return redirect()->route('admin.slides.index')
            ->with('success', 'Kartu "' . $title . '" beserta itemnya berhasil dihapus.');
    }
}
