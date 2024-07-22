<?php

namespace Wiroom\WiroomSeo;

use Laravel\Nova\Fields\SupportsDependentFields;
use Wiroom\WiroomSeo\Providers\FieldServiceProvider;
use Wiroom\WiroomSeo\Traits\FieldHandlesDehydration;
use Wiroom\WiroomSeo\Traits\FieldHandlesHydration;
use Wiroom\WiroomSeo\Traits\FieldHandlesMeta;
use Wiroom\WiroomSeo\Traits\FieldHandlesSerialization;
use Wiroom\WiroomSeo\Traits\FieldHandlesValidation;

class WiroomSeo extends \Laravel\Nova\Fields\Field
{
    use SupportsDependentFields;
    use FieldHandlesMeta;
    use FieldHandlesHydration;
    use FieldHandlesDehydration;
    use FieldHandlesSerialization;
    use FieldHandlesValidation;

    public $component = FieldServiceProvider::FIELD_NAME;
}
