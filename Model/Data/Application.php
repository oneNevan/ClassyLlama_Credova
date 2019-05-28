<?php

namespace ClassyLlama\Credova\Model\Data;

class Application extends \Magento\Framework\Api\AbstractSimpleObject implements \ClassyLlama\Credova\Api\Data\ApplicationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getPublicId()
    {
        return (string)$this->_get(self::PUBLIC_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setPublicId(string $publicId)
    {
        return $this->setData(self::PUBLIC_ID, $publicId);
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreCode()
    {
        return (string)$this->_get(self::STORE_CODE);
    }

    /**
     * {@inheritdoc}
     */
    public function setStoreCode(string $storeCode)
    {
        return $this->setData(self::STORE_CODE, $storeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstName()
    {
        return (string)$this->_get(self::FIRST_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setFirstName(string $firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * {@inheritdoc}
     */
    public function getMiddleInitial()
    {
        return (string)$this->_get(self::MIDDLE_INITIAL);
    }

    /**
     * {@inheritdoc}
     */
    public function setMiddleInitial(string $middleInitial)
    {
        return $this->setData(self::MIDDLE_INITIAL, $middleInitial);
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName()
    {
        return (string)$this->_get(self::LAST_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setLastName(string $lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * {@inheritdoc}
     */
    public function getDateOfBirth()
    {
        return (string)$this->_get(self::DATE_OF_BIRTH);
    }

    /**
     * {@inheritdoc}
     */
    public function setDateOfBirth(string $dateOfBirth)
    {
        return $this->setData(self::DATE_OF_BIRTH, $dateOfBirth);
    }

    /**
     * {@inheritdoc}
     */
    public function getMobilePHone()
    {
        return (string)$this->_get(self::MOBILE_PHONE);
    }

    /**
     * {@inheritdoc}
     */
    public function setMobilePHone(string $mobilePhone)
    {
        return $this->setData(self::MOBILE_PHONE, $mobilePhone);
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return (string)$this->_get(self::EMAIL);
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail(string $email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * {@inheritdoc}
     */
    public function getNeededAmount()
    {
        return (string)$this->_get(self::NEEDED_AMOUNT);
    }

    /**
     * {@inheritdoc}
     */
    public function setNeededAmount(string $neededAmount)
    {
        return $this->setData(self::NEEDED_AMOUNT, $neededAmount);
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl()
    {
        return (string)$this->_get(self::REDIRECT_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setRedirectUrl(string $redirectUrl)
    {
        return $this->setData(self::REDIRECT_URL, $redirectUrl);
    }

    /**
     * {@inheritdoc}
     */
    public function getReferenceNumber()
    {
        return (string)$this->_get(self::REFERENCE_NUMBER);
    }

    /**
     * {@inheritdoc}
     */
    public function setReferenceNumber(string $referenceNumber)
    {
        return $this->setData(self::REFERENCE_NUMBER, $referenceNumber);
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress()
    {
        return $this->_get(self::ADDRESS);
    }

    /**
     * {@inheritdoc}
     */
    public function setAddress(\ClassyLlama\Credova\Api\Data\Application\AddressInterface $address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * {@inheritdoc}
     */
    public function getProducts()
    {
        return $this->_get(self::PRODUCTS) ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function setProducts(array $products)
    {
        return $this->setData(self::PRODUCTS, $products);
    }
}
