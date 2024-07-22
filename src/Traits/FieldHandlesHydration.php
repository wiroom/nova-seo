<?php

namespace Wiroom\WiroomSeo\Traits;

trait FieldHandlesHydration
{
    protected function resolveAttribute($resource, $attribute)
    {
        $value = parent::resolveAttribute($resource, $attribute);

        // additional value manipulation after hydration

        return $value;
    }
}
