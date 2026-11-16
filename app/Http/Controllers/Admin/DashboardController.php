<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Slide;
use App\Models\SlideItem;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalSlides = Slide::count();
        $totalItems = SlideItem::count();
        $slides = Slide::withCount('items')->orderBy('order')->get();
        $settings = SiteSetting::all()->pluck('value', 'key');

        return view('admin.dashboard', compact(
            'totalSlides',
            'totalItems',
            'slides',
            'settings'
        ));
    }
}
