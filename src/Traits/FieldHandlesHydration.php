<?php

namespace Wiroom\NovaSeo\Traits;

trait FieldHandlesHydration
{
    protected function resolveAttribute($resource, $attribute)
    {
        /** @var \Wiroom\NovaSeo\Concerns\SeoMetaable $resource */
        $value = parent::resolveAttribute($resource, $attribute);
        // additional value manipulation after hydration

        return $resource->getSeoMetaData()->toArray();
    }
}
