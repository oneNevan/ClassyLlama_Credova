<?php
/**
 * @category    ClassyLlama
 * @copyright   Copyright (c) 2019 Classy Llama Studios, LLC
 * @author      sean.templeton
 */

namespace ClassyLlama\Credova\Block\Product;

use Magento\Framework\Registry;

class Prequalification implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @return float
     */
    public function getProductFinalPrice()
    {
        return (float)$this->registry->registry('product')
            ->getPriceInfo()
            ->getPrice('final_price')
            ->getAmount()
            ->getBaseAmount();
    }
}
