<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

return static function (TreeBuilder $config) {
    $rootNode = $config->getRootNode();

    $rootNode
        ->children()
            ->scalarNode('uri')->cannotBeEmpty()->end()
            ->scalarNode('prefix')->cannotBeEmpty()->end()
        ->end()
    ;

    return $config;
};
