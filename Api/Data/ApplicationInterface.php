<?php

namespace ClassyLlama\Credova\Api\Data;

interface ApplicationInterface
{
    const PUBLIC_ID = 'public_id';
    const STORE_CODE = 'store_code';
    const FIRST_NAME = 'first_name';
    const MIDDLE_INITIAL = 'middle_initial';
    const LAST_NAME = 'last_name';
    const DATE_OF_BIRTH = 'date_of_birth';
    const MOBILE_PHONE = 'mobile_phone';
    const EMAIL = 'email';
    const NEEDED_AMOUNT = 'needed_amount';
    const REDIRECT_URL = 'redirect_url';
    const REFERENCE_NUMBER = 'reference_number';
    const ADDRESS = 'address';
    const PRODUCTS = 'products';

    /**
     * Get application public ID
     *
     * @return string
     */
    public function getPublicId();

    /**
     * Set application public ID
     *
     * @param string $publicId
     * @return $this
     */
    public function setPublicId(string $publicId);

    /**
     * Get application store code
     *
     * @return string
     */
    public function getStoreCode();

    /**
     * Set application store code
     *
     * @param string $storeCode
     * @return $this
     */
    public function setStoreCode(string $storeCode);

    /**
     * Get application first name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set application first name
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName);

    /**
     * Get application middle initial
     *
     * @return string
     */
    public function getMiddleInitial();

    /**
     * Set application middle initial
     *
     * @param string $middleInitial
     * @return $this
     */
    public function setMiddleInitial(string $middleInitial);

    /**
     * Get application last name
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set application last name
     *
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName);

    /**
     * Get application date of birth
     *
     * @return string
     */
    public function getDateOfBirth();

    /**
     * Set application date of birth
     *
     * @param string $dateOfBirth
     * @return $this
     */
    public function setDateOfBirth(string $dateOfBirth);

    /**
     * Get application mobile phone
     *
     * @return string
     */
    public function getMobilePHone();

    /**
     * Set application mobile phone
     *
     * @param string $mobilePhone
     * @return $this
     */
    public function setMobilePHone(string $mobilePhone);

    /**
     * Get application email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set application email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email);

    /**
     * Get application needed amount
     *
     * @return string
     */
    public function getNeededAmount();

    /**
     * Set application needed amount
     *
     * @param string $neededAmount
     * @return $this
     */
    public function setNeededAmount(string $neededAmount);

    /**
     * Get application redirect URL
     *
     * @return string
     */
    public function getRedirectUrl();

    /**
     * Set application redirect URL
     *
     * @param string $redirectUrl
     * @return $this
     */
    public function setRedirectUrl(string $redirectUrl);

    /**
     * Get application reference number
     *
     * @return string
     */
    public function getReferenceNumber();

    /**
     * Set application reference number
     *
     * @param string $referenceNumber
     * @return $this
     */
    public function setReferenceNumber(string $referenceNumber);

    /**
     * Get application address
     *
     * @return \ClassyLlama\Credova\Api\Data\Application\AddressInterface
     */
    public function getAddress();

    /**
     * Set application address
     *
     * @param \ClassyLlama\Credova\Api\Data\Application\AddressInterface $address
     * @return $this
     */
    public function setAddress(\ClassyLlama\Credova\Api\Data\Application\AddressInterface $address);

    /**
     * Get application products
     *
     * @return \ClassyLlama\Credova\Api\Data\Application\ProductInterface[]
     */
    public function getProducts();

    /**
     * Set application products
     *
     * @param \ClassyLlama\Credova\Api\Data\Application\ProductInterface[] $products
     * @return $this
     */
    public function setProducts(array $products);
}