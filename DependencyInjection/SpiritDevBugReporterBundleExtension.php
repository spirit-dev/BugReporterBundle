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

        if (!isset($config['spirit_dev_bug_reporter']['assembly']['guid'])) {
            throw new \InvalidArgumentException('The "guid" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.guid', $config['spirit_dev_bug_reporter']['assembly']['guid']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['product'])) {
            throw new \InvalidArgumentException('The "product" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.product', $config['spirit_dev_bug_reporter']['assembly']['product']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['title'])) {
            throw new \InvalidArgumentException('The "title" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.title', $config['spirit_dev_bug_reporter']['assembly']['title']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['description'])) {
            throw new \InvalidArgumentException('The "description" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.description', $config['spirit_dev_bug_reporter']['assembly']['description']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['culture'])) {
            throw new \InvalidArgumentException('The "culture" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.culture', $config['spirit_dev_bug_reporter']['assembly']['culture']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['configuration'])) {
            throw new \InvalidArgumentException('The "configuration" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.configuration', $config['spirit_dev_bug_reporter']['assembly']['configuration']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['company'])) {
            throw new \InvalidArgumentException('The "company" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.company', $config['spirit_dev_bug_reporter']['assembly']['company']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['copyright'])) {
            throw new \InvalidArgumentException('The "copyright" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.copyright', $config['spirit_dev_bug_reporter']['assembly']['copyright']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['assembly']['trademark'])) {
            throw new \InvalidArgumentException('The "trademark" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.assembly.trademark', $config['spirit_dev_bug_reporter']['assembly']['trademark']);
        }


        if (!isset($config['spirit_dev_bug_reporter']['odoo_middleware']['url'])) {
            throw new \InvalidArgumentException('The "url" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.url', $config['spirit_dev_bug_reporter']['odoo_middleware']['url']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['odoo_middleware']['contact_mail'])) {
            throw new \InvalidArgumentException('The "contact_mail" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.contact_mail', $config['spirit_dev_bug_reporter']['odoo_middleware']['contact_mail']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['odoo_middleware']['project_ref_id'])) {
            throw new \InvalidArgumentException('The "project_ref_id" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.project_ref_id', $config['spirit_dev_bug_reporter']['odoo_middleware']['project_ref_id']);
        }
        if (!isset($config['spirit_dev_bug_reporter']['odoo_middleware']['partner_ref_id'])) {
            throw new \InvalidArgumentException('The "partner_ref_id" option must be set');
        } else {
            $container->setParameter('spirit_dev_bug_reporter.odoo_middleware.partner_ref_id', $config['spirit_dev_bug_reporter']['odoo_middleware']['partner_ref_id']);
        }
    }

    public function getXsdValidationBasePath() {
        return __DIR__ . '/../Resources/config/';
    }

    public function getNamespace() {
        return 'http://www.example.com/symfony/schema/';
    }
}