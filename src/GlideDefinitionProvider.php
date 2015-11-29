<?php

namespace GlideModule;

use Assembly\ArrayDefinitionProvider;
use function Assembly\factory;
use function Assembly\get;
use function Assembly\object;

class GlideDefinitionProvider extends ArrayDefinitionProvider
{
    public function getArrayDefinitions()
    {
        return [
            // Options are empty by default
            'glide.options' => [],

            'glide.factory' => object('GlideModule\GlideFactory')
                ->setConstructorArguments(get('glide.options')),

            'glide' => factory(get('glide.factory'), 'create'),
        ];
    }
}
