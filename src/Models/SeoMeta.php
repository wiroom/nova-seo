<?php

namespace Wiroom\NovaSeo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SeoMeta extends Model
{
    protected $table = 'nova_seo_metas';

    protected $guarded = [];

    protected $casts = [
        'is_robots_noindex' => 'boolean',
        'is_robots_nofollow' => 'boolean',
        'image_meta' => 'array',
    ];

    /**
     * Get the owning indexable model.
     */
    public function indexable(): MorphTo
    {
        return $this->morphTo();
    }
}
