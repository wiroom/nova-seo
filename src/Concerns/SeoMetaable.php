<?php

namespace Wiroom\NovaSeo\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Wiroom\NovaSeo\Data\SeoMetaData;

/**
 * @property \Wiroom\NovaSeo\Models\SeoMeta seo_meta
 */
interface SeoMetaable
{
    public function seo_meta(): MorphOne;

    public function getSeoMetaData(): SeoMetaData;
}
