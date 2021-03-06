<?php


namespace ClassyLlama\Credova\Api;

interface ApplicationInterface
{
    /**
     * Creates an application in Credova and returns the public id
     *
     * @param \ClassyLlama\Credova\Api\Data\ApplicationInfoInterface $applicationInfo
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function createApplication($applicationInfo);
}
