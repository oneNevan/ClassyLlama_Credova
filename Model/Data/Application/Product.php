<?php

namespace ClassyLlama\Credova\Model\Data\Application;

class Product extends \Magento\Framework\Api\AbstractSimpleObject implements \ClassyLlama\Credova\Api\Data\Application\ProductInterface
{

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return (string)$this->_get(self::ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setID(string $id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return (string)$this->_get(self::DESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription(string $description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * {@inheritdoc}
     */
    public function getSerialNumber()
    {
        return (string)$this->_get(self::SERIAL_NUMBER);
    }

    /**
     * {@inheritdoc}
     */
    public function setSerialNumber(string $serialNumber)
    {
        return $this->setData(self::SERIAL_NUMBER, $serialNumber);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuantity()
    {
        return (string)$this->_get(self::QUANTITY);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuantity(string $quantity)
    {
        return $this->setData(self::QUANTITY, $quantity);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return (string)$this->_get(self::VALUE);
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(string $value)
    {
        return $this->setData(self::VALUE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getSalesTax()
    {
        return (string)$this->_get(self::SALES_TAX);
    }

    /**
     * {@inheritdoc}
     */
    public function setSalesTax(string $salesTax)
    {
        return $this->setData(self::SALES_TAX, $salesTax);
    }
}
