<?php

namespace SonLabs\FormBuilder\Facades;

use Illuminate\Support\Facades\Facade;

class Formbuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Formbuilder';
    }
}
