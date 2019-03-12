<?php

namespace ClassyLlama\Credova\CredovaApi\Authenticated;

abstract class AuthenticatedRequestAbstract extends \ClassyLlama\Credova\CredovaApi\RequestAbstract
{
    /**
     * @var \ClassyLlama\Credova\Helper\Api
     */
    protected $apiHelper;

    /**
     * AuthenticatedRequestAbstract constructor.
     * @param \Zend\Http\ClientFactory $clientFactory
     * @param \ClassyLlama\Credova\Helper\Config $configHelper
     * @param \Psr\Log\LoggerInterface $logger
     * @param \ClassyLlama\Credova\Helper\Api $apiHelper
     */
    public function __construct(
        \Zend\Http\ClientFactory $clientFactory,
        \ClassyLlama\Credova\Helper\Config $configHelper,
        \Psr\Log\LoggerInterface $logger,
        // End parent parameters

        \ClassyLlama\Credova\Helper\Api $apiHelper
    ) {
        parent::__construct(
            $clientFactory,
            $configHelper,
            $logger
        );
        $this->apiHelper = $apiHelper;
    }

    /**
     * Add authentication header
     *
     * {@inheritdoc}
     * @throws \ClassyLlama\Credova\Exception\CredovaApiException
     */
    protected function getHeaders() : array
    {
        $headers = parent::getHeaders();

        $authToken = $this->apiHelper->getAuthToken();

        $headers['Authorization'] = "Bearer $authToken";

        return $headers;
    }
}