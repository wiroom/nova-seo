<?php

namespace Wiroom\NovaSeo\Traits;

trait FieldHandlesMeta
{
    protected function defaultMeta(): array
    {
        return [
            //
        ];
    }

    public function meta(): array
    {
        return [
            ...$this->defaultMeta(),
            ...parent::meta(),
        ];
    }
}
