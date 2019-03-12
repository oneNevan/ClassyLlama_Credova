<?php

namespace ClassyLlama\Credova\Helper;

use Magento\Framework\App\Helper\Context;

class Api extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $authToken = null;
    /**
     * @var \ClassyLlama\Credova\CredovaApi\AuthTokenRequest
     */
    protected $authTokenRequest;

    /**
     * Api constructor.
     * @param Context $context
     * @param \ClassyLlama\Credova\CredovaApi\AuthTokenRequest $authTokenRequest
     */
    public function __construct(
        Context $context,
        // End parent parameters

        \ClassyLlama\Credova\CredovaApi\AuthTokenRequest $authTokenRequest
    ) {
        parent::__construct($context);
        $this->authTokenRequest = $authTokenRequest;
    }

    /**
     * Get auth token singleton
     *
     * @return string
     * @throws \ClassyLlama\Credova\Exception\CredovaApiException
     */
    public function getAuthToken() : string
    {
        if (is_null($this->authToken)) {
            $this->authToken = $this->authTokenRequest->getToken();
        }

        return $this->authToken;
    }
}
