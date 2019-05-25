<?php
/**
 * @category    ClassyLlama
 * @copyright   Copyright (c) 2019 Classy Llama Studios, LLC
 * @author      sean.templeton
 */

namespace ClassyLlama\Credova\Model\Method;

use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Framework\DataObject;
use Magento\Payment\Model\InfoInterface;

class Credova extends \Magento\Payment\Model\Method\AbstractMethod
{
    const ADDITIONAL_INFO_APPLICATION_ID_KEY = 'credova_application_id';
    const CODE = 'credova';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::CODE;

    /**
     * @var \Magento\Sales\Api\Data\OrderExtensionFactory
     */
    protected $orderExtensionInterfaceFactory;

    protected $applicationId = null;

    public function __construct(
        \Magento\Sales\Api\Data\OrderExtensionFactory $orderExtensionInterfaceFactory,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        \Magento\Framework\Api\AttributeValueFactory $customAttributeFactory,
        \Magento\Payment\Helper\Data $paymentData,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Payment\Model\Method\Logger $logger,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [],
        DirectoryHelper $directory = null
    ) {
        parent::__construct($context, $registry, $extensionFactory, $customAttributeFactory, $paymentData, $scopeConfig, $logger, $resource, $resourceCollection, $data, $directory);
        $this->orderExtensionInterfaceFactory = $orderExtensionInterfaceFactory;
    }

    /**
     * Capture payment abstract method
     *
     * @param \Magento\Framework\DataObject|InfoInterface $payment
     * @param float $amount
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function capture(InfoInterface $payment, $amount)
    {
        /** @var \Magento\Sales\Api\Data\OrderInterface $order */
        $order = $payment->getOrder();

        $orderExtensionAttributes = $order->getExtensionAttributes();

        if ($orderExtensionAttributes === null) {
            $orderExtensionAttributes = $this->extensionAttributesFactory->create();
        }

        $applicationId =
            $this->getInfoInstance()->getAdditionalInformation(self::ADDITIONAL_INFO_APPLICATION_ID_KEY);

        if ($applicationId !== null) {
            $orderExtensionAttributes->setCredovaApplicationId($applicationId);
            $order->setExtensionAttributes($orderExtensionAttributes);
            $payment->setOrder($order);
        }

        parent::capture($payment, $amount);
    }

    public function assignData(DataObject $data)
    {
        parent::assignData($data);

        // TODO: look before you leap
        $applicationId = $data->getData('additional_data')['application_id'];

        // Set application ID on info instance to persist for later use
        $this->getInfoInstance()->setAdditionalInformation(self::ADDITIONAL_INFO_APPLICATION_ID_KEY, $applicationId);

        return $this;
    }

    public function canCapture()
    {
        return true;
    }
}
