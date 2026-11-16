<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SlideItem extends Model
{
    protected $fillable = [
        'slide_id',
        'title',
        'subtitle',
        'url',
        'action_type',
        'badge',
        'icon',
        'detail_content',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function slide(): BelongsTo
    {
        return $this->belongsTo(Slide::class);
    }
}
