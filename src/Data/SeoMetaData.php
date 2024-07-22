<?php

namespace Wiroom\NovaSeo\Data;

use Spatie\LaravelData\Data;
use Wiroom\NovaSeo\Concerns\SeoMetaable;

/**
 * @uses self::fromIndexable
 */
class SeoMetaData extends Data
{
    public function __construct(
        public ?string $title,
        public ?string $description,
        public ?string $focus_keyword,
        public ?int $focus_keyword_score,
        public ?int $readability_score,
        public ?int $estimated_reading_time,
        public string $permalink,
        public ?string $canonical_url,
        public ?string $image_url,
        public bool $robots_noindex = false,
        public bool $robots_nofollow = false,
    ) {
    }

    public static function fromIndexable(SeoMetaable $indexable): self
    {
        $seoMeta = $indexable->seo_meta;
        $permalink = $indexable->getSeoPermalink();

        return self::from([
            'title' => $seoMeta?->title ?? $indexable->getSeoTitleDefault(),
            'description' => $seoMeta?->description ?? $indexable->getSeoDescriptionDefault(),
            'focus_keyword' => $seoMeta?->focus_keyword,
            'permalink' => $permalink ? url($permalink) : '',
            'canonical_url' => $seoMeta?->canonical_url ?? $indexable->getSeoCanonicalUrl(),
            'image_url' => $seoMeta?->image ?? $indexable->getSeoImageDefault(),
            'robots_noindex' => $seoMeta?->is_robots_noindex ?? $indexable->getSeoRobotsNoIndexDefault(),
            'robots_nofollow' => $seoMeta?->is_robots_nofollow ?? $indexable->getSeoRobotsNoFollowDefault(),
        ]);
    }
}
