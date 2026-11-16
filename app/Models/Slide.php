<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slide extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'banner_image',
        'banner_text',
        'banner_grad',
        'card_bg',
        'card_text',
        'nav_label',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(SlideItem::class)->orderBy('order', 'asc');
    }

    public function activeItems(): HasMany
    {
        return $this->hasMany(SlideItem::class)->where('is_active', true)->orderBy('order', 'asc');
    }
}
