<?php


namespace shude\LaximoBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('shude_laximo');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->children()
            ->scalarNode('laximo_login')->defaultValue("")->info("Laximo API login")->end()
            ->scalarNode('laximo_key')->defaultValue("")->info("Laximo API password")->end()
        ->end();

        return $treeBuilder;
    }

}