<?php


namespace shude\LaximoBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class ShudeLaximoExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('shude_laximo.basic.credentials');
        if(!empty($config['laximo_login'])){
            $definition->setArgument(0, $config['laximo_login']);
        }
        if(!empty($config['laximo_key'])){
            $definition->setArgument(1, $config['laximo_key']);
        }
    }
}