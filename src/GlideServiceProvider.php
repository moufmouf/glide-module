<?php

namespace GlideModule;

use Interop\Container\ContainerInterface;
use League\Glide\ServerFactory;

class GlideServiceProvider
{
    public static function getServices()
    {
        return [
            'glide' => 'createGlide',
            'glide.options' => 'getOptions',
        ];
    }

    public static function createGlide(ContainerInterface $container)
    {
        return ServerFactory::create($container->get('glide.options'));
    }

    public static function getOptions()
    {
        // Options are empty by default
        return [];
    }
}
