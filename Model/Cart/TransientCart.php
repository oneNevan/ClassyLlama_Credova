<?php

namespace ClassyLlama\Credova\Model\Cart;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Model\Session;

class TransientCart extends \Magento\Checkout\Model\Cart
{
    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $this->_eventManager->dispatch('checkout_cart_save_before', ['cart' => $this]);

        $this->getQuote()->getBillingAddress();
        $this->getQuote()->getShippingAddress()->setCollectShippingRates(true);
        $this->getQuote()->collectTotals();

        // Intentionally don't actually save quote

        return $this;
    }
}
