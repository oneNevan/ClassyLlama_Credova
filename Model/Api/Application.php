<?php


namespace ClassyLlama\Credova\Model\Api;


use ClassyLlama\Credova\Api\ApplicationInterface;
use ClassyLlama\Credova\Api\Data;
use ClassyLlama\Credova\Helper\Config;

class Application implements ApplicationInterface
{

    /**
     * @var \ClassyLlama\Credova\CredovaApi\Authenticated\ApplicationFactory
     */
    private $applicationRequestFactory;
    /**
     * @var Config
     */
    private $configHelper;
    /**
     * @var \Magento\Checkout\Model\Session
     */
    private $checkoutSession;

    public function __construct(\ClassyLlama\Credova\CredovaApi\Authenticated\ApplicationFactory $applicationRequestFactory, Config $configHelper, \Magento\Checkout\Model\Session $checkoutSession)
    {
        $this->applicationRequestFactory = $applicationRequestFactory;
        $this->configHelper = $configHelper;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * Creates an application in Credova and returns the public id
     *
     * @param Data\ApplicationInfoInterface $applicationInfo
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function createApplication($applicationInfo)
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        // TODO: Handle exception when number is malformed
        // Need to parse the phone number to ensure it's formatted properly for Credova's api
        $phoneNumber = $phoneUtil->parse($applicationInfo->getPhoneNumber(), "US");

        $data = [
            'storeCode' => $this->configHelper->getCredovaStoreCode(),
            'redirectUrl' => 'https://credova.test/checkout/credovaCapture',
            'firstName' => $applicationInfo->getFirstName(),
            'lastName' => $applicationInfo->getLastName(),
            'email' => $applicationInfo->getEmail(),
            'mobilePhone' => $phoneNumber->getNationalNumber(),
            'products' => []
        ];

        // TODO: Handle when the shopping cart is empty
        /** @var \Magento\Quote\Model\Quote\Item $item */
        foreach ($this->checkoutSession->getQuote()->getItems() as $item) {
            $data['products'][] = [
                'id' => $item->getItemId(),
                'description' => $item->getName(),
                'quantity' => $item->getQty(),
                'value' => (float)$item->getBaseRowTotalInclTax() - (float)$item->getBaseDiscountAmount()
            ];
        }

        if ($applicationInfo->getPublicId() !== null) {
            $data['publicId'] = $applicationInfo->getPublicId();
        }

        /** @var \ClassyLlama\Credova\CredovaApi\Authenticated\Application $request */
        $request = $this->applicationRequestFactory->create(['applicationInfo' => $data]);
        $response = $request->getResponseData();

        if(!array_key_exists('publicId', $response)) {
            // TODO: Properly handle API errors
            throw new \Exception($response);
        }

        return $response['publicId'];
    }
}
