<?php

namespace ClassyLlama\Credova\Api\Data\Application;

interface AddressInterface
{
    const STREET = 'street';
    const SUITE_APARTMENT = 'suite_apartment';
    const ZIP_CODE = 'zip_code';
    const CITY = 'city';
    const STATE = 'state';

    /**
     * Get address street
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set address street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet(string $street);

    /**
     * Get address suite apartment
     *
     * @return string
     */
    public function getSuiteApartment();

    /**
     * Set address suite apartment
     *
     * @param string $suiteApartment
     * @return $this
     */
    public function setSuiteApartment(string $suiteApartment);

    /**
     * Get address zip code
     *
     * @return string
     */
    public function getZipCode();

    /**
     * Set address zip code
     *
     * @param string $zip
     * @return $this
     */
    public function setZipCode(string $zip);

    /**
     * Get address city
     *
     * @return string
     */
    public function getCity();

    /**
     * Set address city
     *
     * @param string $city
     * @return $this
     */
    public function setCity(string $city);

    /**
     * Get address state
     *
     * @return string
     */
    public function getState();

    /**
     * Set address state
     *
     * @param string $state
     * @return $this
     */
    public function setState(string $state);
}