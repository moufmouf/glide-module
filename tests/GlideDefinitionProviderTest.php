<?php

use Assembly\Container\Container;
use GlideModule\GlideDefinitionProvider;

class GlideDefinitionProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGlide()
    {
        $container = new Container([], [new GlideDefinitionProvider()]);

        $glide = $container->get('glide');

        $this->assertInstanceOf('League\Glide\Server', $glide);
    }
}
