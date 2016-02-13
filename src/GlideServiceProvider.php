<?php

namespace GlideModule;

use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProvider\ServiceProvider;
use League\Glide\Server;
use League\Glide\ServerFactory;

class GlideServiceProvider implements ServiceProvider
{
    public static function getServices()
    {
        return [
            Server::class => 'createGlide',
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
