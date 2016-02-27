<?php

namespace GlideModule;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProvider\ServiceProvider;
use League\Glide\Responses\PsrResponseFactory;
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
        $options = $container->get('glide.options');

        $server = ServerFactory::create($options);

        // We override the response factory to return PSR-7 response by default
        $responseFactory = new PsrResponseFactory(new Response(), function ($stream) {
            return new Stream($stream);
        });
        $server->setResponseFactory($responseFactory);

        return $server;
    }

    public static function getOptions()
    {
        // Options are empty by default
        return [];
    }
}
