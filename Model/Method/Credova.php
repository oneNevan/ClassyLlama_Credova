<?php
/**
 * @category    ClassyLlama
 * @copyright   Copyright (c) 2019 Classy Llama Studios, LLC
 * @author      sean.templeton
 */

namespace ClassyLlama\Credova\Model\Method;

use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Payment\Model\InfoInterface;
use \Magento\Framework\DataObject;

class Credova extends \Magento\Payment\Model\Method\AbstractMethod
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = 'credova';

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
    )
    {
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

        if($orderExtensionAttributes === null) {
            $orderExtensionAttributes = $this->extensionAttributesFactory->create();
        }

        $orderExtensionAttributes->setCredovaApplicationId($this->applicationId);
        $order->setExtensionAttributes($orderExtensionAttributes);
        $payment->setOrder($order);

        parent::capture($payment, $amount);
    }

    public function assignData(DataObject $data)
    {
        parent::assignData($data);

        $this->applicationId = $data->getData('additional_data')['application_id'];

        return $this;
    }


    public function canCapture()
    {
        return true;
    }
}
