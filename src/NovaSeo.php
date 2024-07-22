<?php

namespace Wiroom\NovaSeo;

use Laravel\Nova\Fields\SupportsDependentFields;
use Wiroom\NovaSeo\Providers\FieldServiceProvider;
use Wiroom\NovaSeo\Traits\FieldHandlesDehydration;
use Wiroom\NovaSeo\Traits\FieldHandlesHydration;
use Wiroom\NovaSeo\Traits\FieldHandlesMeta;
use Wiroom\NovaSeo\Traits\FieldHandlesSerialization;
use Wiroom\NovaSeo\Traits\FieldHandlesValidation;

class NovaSeo extends \Laravel\Nova\Fields\Field
{
    use SupportsDependentFields;
    use FieldHandlesMeta;
    use FieldHandlesHydration;
    use FieldHandlesDehydration;
    use FieldHandlesSerialization;
    use FieldHandlesValidation;

    public $component = FieldServiceProvider::FIELD_NAME;
}
