<?php

namespace ClassyLlama\Credova\ViewModel;

class Qualification implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    const ENVIRONMENT_STAGE_JS_CONSTANT = 'CRDV.Environment.Staging';
    const ENVIRONMENT_PROD_JS_CONSTANT = 'CRDV.Environment.Prod'; // @todo: confirm this value

    /**
     * @var \ClassyLlama\Credova\Helper\Config
     */
    protected $configHelper;

    /**
     * Qualification constructor.
     * @param \ClassyLlama\Credova\Helper\Config $configHelper
     */
    public function __construct(
        \ClassyLlama\Credova\Helper\Config $configHelper
    ) {
        $this->configHelper = $configHelper;
    }

    /**
     * Get config helper instance
     *
     * @return \ClassyLlama\Credova\Helper\Config
     */
    public function getConfigHelper() : \ClassyLlama\Credova\Helper\Config
    {
        return $this->configHelper;
    }

    /**
     * Get Credova plugin environment JS constant
     *
     * @return string
     */
    public function getEnvironmentConstant() : string
    {
        switch ($this->configHelper->getCredovaEnvironment()) {
            case \ClassyLlama\Credova\Model\Config\Source\Environment::ENVIRONMENT_PROD:
                return self::ENVIRONMENT_PROD_JS_CONSTANT;

            // Fall through to stage for any other values
            default:
                return self::ENVIRONMENT_STAGE_JS_CONSTANT;
        }
    }
}