<?php

namespace GlideModule;

use Assembly\FactoryDefinition;
use Assembly\InstanceDefinition;
use Assembly\ParameterDefinition;
use Assembly\Reference;
use Interop\Container\Definition\DefinitionProviderInterface;

class GlideDefinitionProvider implements DefinitionProviderInterface
{
    public function getDefinitions()
    {
        // Options are empty by default
        $options = new ParameterDefinition('glide.options', []);

        $factory = new InstanceDefinition('glide.factory', 'GlideModule\GlideFactory');
        $factory->addConstructorArgument(new Reference('glide.options'));

        $server = new FactoryDefinition('glide', new Reference('glide.factory'), 'create');

        return [
            $options,
            $factory,
            $server,
        ];
    }
}
