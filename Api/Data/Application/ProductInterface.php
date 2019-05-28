<?php

namespace ClassyLlama\Credova\Api\Data\Application;

interface ProductInterface
{
    const ID = 'id';
    const DESCRIPTION = 'description';
    const SERIAL_NUMBER = 'serial_number';
    const QUANTITY = 'quantity';
    const VALUE = 'value';
    const SALES_TAX = 'sales_tax';

    /**
     * Get application product id
     *
     * @return string
     */
    public function getId();

    /**
     * Set application product id
     *
     * @param string $id
     * @return $this
     */
    public function setID(string $id);

    /**
     * Get application product description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set application product description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description);

    /**
     * Get application product serial number
     *
     * @return string
     */
    public function getSerialNumber();

    /**
     * Set application product serial number
     *
     * @param string $serialNumber
     * @return $this
     */
    public function setSerialNumber(string $serialNumber);

    /**
     * Get application product quantity
     *
     * @return string
     */
    public function getQuantity();

    /**
     * Set application product quantity
     *
     * @param string $quantity
     * @return $this
     */
    public function setQuantity(string $quantity);

    /**
     * Get application product value
     *
     * @return string
     */
    public function getValue();

    /**
     * Set application product value
     *
     * @param string $value
     * @return $this
     */
    public function setValue(string $value);

    /**
     * Get application product sales tax
     *
     * @return string
     */
    public function getSalesTax();

    /**
     * Set application product sales tax
     *
     * @param string $salesTax
     * @return $this
     */
    public function setSalesTax(string $salesTax);

}