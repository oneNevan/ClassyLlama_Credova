<?php

namespace ClassyLlama\Credova\Model\Data\Application;

class Address extends \Magento\Framework\Api\AbstractSimpleObject implements \ClassyLlama\Credova\Api\Data\Application\AddressInterface
{

    /**
     * {@inheritdoc
     */
    public function getStreet()
    {
        return (string)$this->_get(self::STREET);
    }

    /**
     * {@inheritdoc}
     */
    public function setStreet(string $street)
    {
        return $this->setData(self::STREET, $street);
    }

    /**
     * {@inheritdoc
     */
    public function getSuiteApartment()
    {
        return (string)$this->_get(self::SUITE_APARTMENT);
    }

    /**
     * {@inheritdoc}
     */
    public function setSuiteApartment(string $suiteApartment)
    {
        return $this->setData(self::SUITE_APARTMENT, $suiteApartment);
    }

    /**
     * {@inheritdoc
     */
    public function getZipCode()
    {
        return (string)$this->_get(self::ZIP_CODE);
    }

    /**
     * {@inheritdoc}
     */
    public function setZipCode(string $zip)
    {
        return $this->setData(self::ZIP_CODE, $zip);
    }

    /**
     * {@inheritdoc
     */
    public function getCity()
    {
        return (string)$this->_get(self::CITY);
    }

    /**
     * {@inheritdoc}
     */
    public function setCity(string $city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * {@inheritdoc
     */
    public function getState()
    {
        return (string)$this->_get(self::STATE);
    }

    /**
     * {@inheritdoc}
     */
    public function setState(string $state)
    {
        return $this->setData(self::STATE, $state);
    }
}
