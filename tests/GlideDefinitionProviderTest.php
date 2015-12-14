<?php

use Assembly\Container\Container;
use GlideModule\GlideDefinitionProvider;

class GlideDefinitionProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGlide()
    {
        $container = new Container([], [new GlideDefinitionProvider(), new GlideOptionDefinitionProvider]);

        $glide = $container->get('glide');

        $this->assertInstanceOf('League\Glide\Server', $glide);
    }
}

class GlideOptionDefinitionProvider extends \Assembly\ArrayDefinitionProvider
{
    public function getArrayDefinitions()
    {
        return [
            // Options are required for glide factory
            'glide.options' => ['source' => sys_get_temp_dir(), 'cache' => sys_get_temp_dir()],
        ];
    }
}
