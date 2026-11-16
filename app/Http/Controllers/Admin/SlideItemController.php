<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\SlideItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SlideItemController extends Controller
{
    public function create(Slide $slide): View
    {
        $nextOrder = ($slide->items()->max('order') ?? 0) + 1;
        return view('admin.items.create', compact('slide', 'nextOrder'));
    }

    public function store(Request $request, Slide $slide): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'subtitle' => 'nullable|string|max:200',
            'url' => 'nullable|string|max:500',
            'action_type' => 'required|string|in:whatsapp,modal_inquiry,modal_detail,call,map,link',
            'badge' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'detail_content' => 'nullable|string|max:2000',
            'order' => 'required|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $slide->items()->create($validated);

        return redirect()->route('admin.slides.edit', $slide)
            ->with('success', 'Item berhasil ditambahkan ke slide!');
    }

    public function edit(SlideItem $item): View
    {
        $item->load('slide');
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, SlideItem $item): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'subtitle' => 'nullable|string|max:200',
            'url' => 'nullable|string|max:500',
            'action_type' => 'required|string|in:whatsapp,modal_inquiry,modal_detail,call,map,link',
            'badge' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'detail_content' => 'nullable|string|max:2000',
            'order' => 'required|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $item->update($validated);

        return redirect()->route('admin.slides.edit', $item->slide_id)
            ->with('success', 'Item "' . $item->title . '" berhasil diperbarui!');
    }

    public function destroy(SlideItem $item): RedirectResponse
    {
        $slideId = $item->slide_id;
        $title = $item->title;
        $item->delete();

        return redirect()->route('admin.slides.edit', $slideId)
            ->with('success', 'Item "' . $title . '" berhasil dihapus.');
    }
}
