<?php

namespace ClassyLlama\Credova\Helper;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    const CREDOVA_ACTIVE_CONFIG_PATH = 'payment/credova/active';
    const CREDOVA_TITLE_CONFIG_PATH = 'payment/credova/title';
    const CREDOVA_API_URL_CONFIG_PATH = 'payment/credova/api_url';
    const CREDOVA_API_USERNAME_CONFIG_PATH = 'payment/credova/api_username';
    const CREDOVA_API_PASSWORD_CONFIG_PATH = 'payment/credova/api_password';
    const CREDOVA_STORE_CODE_CONFIG_PATH = 'payment/credova/store_code';
    const CREDOVA_ENVIRONMENT_CONFIG_PATH = 'payment/credova/environment';
    const CREDOVA_MINIMUM_AMOUNT_CONFIG_PATH = 'payment/credova/minimum_amount';
    const CREDOVA_ALLOW_SPECIFIC_COUNTRIES_CONFIG_PATH = 'payment/credova/allowspecific';
    const CREDOVA_SPECIFIC_COUNTRY_CONFIG_PATH = 'payment/credova/specificcountry';
    const CREDOVA_QUALIFICATION_BUTTON_MESSAGE_CONFIG_PATH = 'payment/credova/qualification_button_message';
    const CREDOVA_LOGGING_ENABLED_CONFIG_PATH = 'payment/credova/logging_enabled';
    const CREDOVA_SORT_ORDER_CONFIG_PATH = 'payment/credova/sort_order';

    /**
     * Get credova payment method active
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return bool
     */
    public function getCredovaActive(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : bool {
        return (bool)$this->scopeConfig->getValue(self::CREDOVA_ACTIVE_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method title
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaTitle(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_TITLE_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method API URL
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaApiUrl(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_API_URL_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method API username
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaApiUsername(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_API_USERNAME_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method API password
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaApiPassword(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_API_PASSWORD_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method store code
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaStoreCode(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_STORE_CODE_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method environment
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaEnvironment(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_ENVIRONMENT_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method minimum order amount
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return float
     */
    public function getCredovaMinimumAmount(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : float {
        return (float)$this->scopeConfig->getValue(self::CREDOVA_MINIMUM_AMOUNT_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method limited to specific countries
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return bool
     */
    public function getCredovaAllowSpecificCountries(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : bool {
        return (bool)$this->scopeConfig->getValue(self::CREDOVA_ALLOW_SPECIFIC_COUNTRIES_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method specific allowed countries
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return array
     */
    public function getCredovaSpecificCountries(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : array {
        return explode(
            ',',
            $this->scopeConfig->getValue(self::CREDOVA_SPECIFIC_COUNTRY_CONFIG_PATH, $scopeType, $scopeCode)
        );
    }

    /**
     * Get credova payment method qualification button message
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return string
     */
    public function getCredovaQualificationButtonMessage(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : string {
        return (string)$this->scopeConfig->getValue(self::CREDOVA_QUALIFICATION_BUTTON_MESSAGE_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method debug logging enabled
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return bool
     */
    public function getCredovaLoggingEnabled(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : bool {
        return (bool)$this->scopeConfig->getValue(self::CREDOVA_LOGGING_ENABLED_CONFIG_PATH, $scopeType, $scopeCode);
    }

    /**
     * Get credova payment method sort order
     *
     * @param string $scopeType
     * @param null $scopeCode
     * @return int
     */
    public function getCredovaSortOrder(
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        $scopeCode = null
    ) : int {
        return (int)$this->scopeConfig->getValue(self::CREDOVA_SORT_ORDER_CONFIG_PATH, $scopeType, $scopeCode);
    }
}