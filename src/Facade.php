<?php

namespace Almod90\Robokassa;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'robokassa';
    }
}
