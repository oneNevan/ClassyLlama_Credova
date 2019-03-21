<?php

namespace ClassyLlama\Credova\Controller\Cart;

use Magento\Catalog\Api\ProductRepositoryInterface;

class TransientAdd extends \Magento\Checkout\Controller\Cart\Add
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * TransientAdd constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
     * @param \ClassyLlama\Credova\Model\Cart\TransientCart $cart
     * @param ProductRepositoryInterface $productRepository
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,

        // Substitute transient cart for native cart object
        \ClassyLlama\Credova\Model\Cart\TransientCart $cart,

        ProductRepositoryInterface $productRepository,
        // end parent parameters

        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct(
            $context,
            $scopeConfig,
            $checkoutSession,
            $storeManager,
            $formKeyValidator,
            $cart,
            $productRepository
        );
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $quote = $this->cart->getQuote();

        $originalTotal = $quote->getGrandTotal();

        // Run native add to cart logic, which happens to be operating on
        // transient cart instance instead of native cart model.
        parent::execute();

        $response = $this->resultJsonFactory->create();

        return $response->setData([
            'originalTotal' => $originalTotal,
            'newTotal' => $quote->getGrandTotal()
        ]);
    }
}
