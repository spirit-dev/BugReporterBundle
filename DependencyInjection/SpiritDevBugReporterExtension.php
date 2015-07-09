<?php

namespace SpiritDev\Bundle\BugReporterBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class SpiritDevBugReporterExtension extends Extension {
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = array();
        foreach ($configs as $subConfig) {
            $config = array_merge($config, $subConfig);
        }
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        if (!isset($config['assembly']['guid'])) {
            throw new \InvalidArgumentException('The "guid" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.guid', $config['assembly']['guid']);
        }
        if (!isset($config['assembly']['product'])) {
            throw new \InvalidArgumentException('The "product" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.product', $config['assembly']['product']);
        }
        if (!isset($config['assembly']['title'])) {
            throw new \InvalidArgumentException('The "title" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.title', $config['assembly']['title']);
        }
        if (!isset($config['assembly']['description'])) {
            throw new \InvalidArgumentException('The "description" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.description', $config['assembly']['description']);
        }
        if (!isset($config['assembly']['culture'])) {
            throw new \InvalidArgumentException('The "culture" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.culture', $config['assembly']['culture']);
        }
        if (!isset($config['assembly']['configuration'])) {
            throw new \InvalidArgumentException('The "configuration" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.configuration', $config['assembly']['configuration']);
        }
        if (!isset($config['assembly']['company'])) {
            throw new \InvalidArgumentException('The "company" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.company', $config['assembly']['company']);
        }
        if (!isset($config['assembly']['copyright'])) {
            throw new \InvalidArgumentException('The "copyright" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.copyright', $config['assembly']['copyright']);
        }
        if (!isset($config['assembly']['trademark'])) {
            throw new \InvalidArgumentException('The "trademark" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.trademark', $config['assembly']['trademark']);
        }


        if (!isset($config['odoo_middleware']['url'])) {
            throw new \InvalidArgumentException('The "url" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.url', $config['odoo_middleware']['url']);
        }
        if (!isset($config['odoo_middleware']['contact_mail'])) {
            throw new \InvalidArgumentException('The "contact_mail" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.contact_mail', $config['odoo_middleware']['contact_mail']);
        }
        if (!isset($config['odoo_middleware']['project_ref_id'])) {
            throw new \InvalidArgumentException('The "project_ref_id" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.project_ref_id', $config['odoo_middleware']['project_ref_id']);
        }
        if (!isset($config['odoo_middleware']['partner_ref_id'])) {
            throw new \InvalidArgumentException('The "partner_ref_id" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.partner_ref_id', $config['odoo_middleware']['partner_ref_id']);
        }
    }

    public function getXsdValidationBasePath() {
        return __DIR__ . '/../Resources/config/';
    }

    public function getNamespace() {
        return 'http://www.example.com/symfony/schema/';
    }
}