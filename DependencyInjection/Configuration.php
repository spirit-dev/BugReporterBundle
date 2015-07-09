<?php

namespace SpiritDev\Bundle\BugReporterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('spirit_dev_bug_reporter');
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
            ->arrayNode('assembly')
            ->children()
            ->scalarNode('guid')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('product')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('title')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('description')->isRequired()->end()
            ->scalarNode('culture')->isRequired()->end()
            ->scalarNode('configuration')->isRequired()->end()
            ->scalarNode('company')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('copyright')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('trademark')->isRequired()->cannotBeEmpty()->end()
            ->end()
            ->end()
            ->arrayNode('odoo_middleware')
            ->children()
            ->scalarNode('url')->isRequiered()->cannotBeEmpty()->end()
            ->scalarNode('contact_mail')->isRequiered()->cannotBeEmpty()->end()
            ->scalarNode('project_ref_id')->isRequiered()->cannotBeEmpty()->end()
            ->scalarNode('partner_ref_id')->isRequiered()->cannotBeEmpty()->end()
            ->end()
            ->end();
        return $treeBuilder;
    }
}