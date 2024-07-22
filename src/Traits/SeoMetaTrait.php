<?php

namespace Wiroom\NovaSeo\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Wiroom\NovaSeo\Data\SeoMetaData;
use Wiroom\NovaSeo\Models\SeoMeta;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait SeoMetaTrait
{
    /**
     * Used to map the nova Field with its SeoMeta model
     * @uses \Wiroom\NovaSeo\Models\SeoMeta::indexable
     */
    public function seo_meta(): MorphOne
    {
        return $this->morphOne(SeoMeta::class, 'indexable');
    }

    /**
     * Used to retrieve the SeoMetaData for the view
     */
    public function getSeoMetaData(): SeoMetaData
    {
        $seoMetaData = SeoMetaData::from($this);

        $seoMetaData->canonical_url = $this->getSeoCanonicalUrl();

        return $seoMetaData;
    }

    public function getSeoTitleDefault(): ?string
    {
        return null;
    }

    public function getSeoDescriptionDefault(): ?string
    {
        return null;
    }

    public function getSeoImageDefault(): ?string
    {
        return null;
    }

    public function getSeoPermalink(): string
    {
        return '';
    }

    public function getSeoCanonicalUrl(): ?string
    {
        return null;
    }

    public function getSeoRobotsNoIndexDefault(): bool
    {
        return config('nova-seo.default_robots_noindex');
    }

    public function getSeoRobotsNoFollowDefault(): bool
    {
        return config('nova-seo.default_robots_nofollow');
    }
}
