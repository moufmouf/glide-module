<?php

namespace GlideModule;

use Assembly\ArrayDefinitionProvider;

class GlideDefinitionProvider extends ArrayDefinitionProvider
{
    public function getArrayDefinitions()
    {
        return [
            // Options are empty by default
            'glide.options' => [],

            'glide.factory' => \Assembly\instance('GlideModule\GlideFactory')
                ->setConstructorArguments(\Assembly\get('glide.options')),

            'glide' => \Assembly\factory('glide.factory', 'create'),
        ];
    }
}
