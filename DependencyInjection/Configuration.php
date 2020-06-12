<?php

namespace Enhavo\Bundle\DoctrineExtensionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('enhavo_doctrine_extension');
        $rootNode = $treeBuilder->getRootNode();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }

    private function addMappingSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('mapping')
                    ->addDefaultsIfNotSet()
                    ->defaultValue([])
                    ->useAttributeAsKey('name')
                    ->arrayPrototype()
                        ->useAttributeAsKey('name')
                        ->prototype('variable')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}