<?php

namespace SpiritDev\Bundle\BugReporterBundle\DependencyInjection;
/**
 * Class ConfigurationManager
 * @package SpiritDev\Bundle\BugReporterBundle\DependencyInjection
 */
class ConfigurationManager {
    private $templateName = null;

    /**
     * @param $template Param defined in config.yml
     */
    public function __construct($template) {
        $this->templateName = $template;
    }

    /**
     * @return String template name
     */
    public function getTemplateName() {
        return $this->templateName;
    }

    /**
     * @param String $templateName
     */
    public function setTemplateName($templateName) {
        $this->templateName = $templateName;
    }
} 