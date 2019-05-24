<?php


namespace ClassyLlama\Credova\Model\Data;


use ClassyLlama\Credova\Api\Data\ApplicationInfoInterface;

class Application extends \Magento\Framework\Api\AbstractExtensibleObject implements ApplicationInfoInterface
{

    /**
     * @return string|null
     */
    public function getPublicId()
    {
        return $this->_get(self::PUBLIC_ID);
    }

    /**
     * @param string $publicId
     * @return $this
     */
    public function setPublicId($publicId)
    {
        return $this->setData(self::PUBLIC_ID, $publicId);
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->_get(self::FIRST_NAME);
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->_get(self::LAST_NAME);
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->_get(self::PHONE_NUMBER);
    }

    /**
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        return $this->setData(self::PHONE_NUMBER, $phoneNumber);
    }

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @return float|null
     */
    public function getNeededAmount()
    {
        return $this->_get(self::NEEDED_AMOUNT);
    }

    /**
     * @param float $neededAmount
     * @return $this
     */
    public function setNeededAmount($neededAmount)
    {
        return $this->setData(self::NEEDED_AMOUNT, $neededAmount);
    }
}
