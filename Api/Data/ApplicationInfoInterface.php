<?php


namespace ClassyLlama\Credova\Api\Data;

interface ApplicationInfoInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
{
    /**#@+
     * Constants defined for keys of the data array. Identical to the name of the getter in snake case
     */
    const PUBLIC_ID = 'public_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const PHONE_NUMBER = 'phone_number';
    const EMAIL = 'email';
    const NEEDED_AMOUNT = 'needed_amount';
    /**#@-*/


    /**
     * @return string|null
     */
    public function getPublicId();


    /**
     * @param string $publicId
     * @return $this
     */
    public function setPublicId($publicId);

    /**
     * @return string|null
     */
    public function getFirstName();


    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * @return string|null
     */
    public function getLastName();


    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * @return string|null
     */
    public function getPhoneNumber();


    /**
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * @return string|null
     */
    public function getEmail();


    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return float|null
     */
    public function getNeededAmount();


    /**
     * @param float $neededAmount
     * @return $this
     */
    public function setNeededAmount($neededAmount);
}
