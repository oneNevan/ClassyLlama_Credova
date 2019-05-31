<?php


namespace ClassyLlama\Credova\CredovaApi\Authenticated;

class RequestReturn extends AuthenticatedRequestAbstract
{
    const PATH = 'v2/applications/%s/requestReturn';

    protected $applicationId;

    public function __construct(\Zend\Http\ClientFactory $clientFactory, \ClassyLlama\Credova\Helper\Config $configHelper, \Psr\Log\LoggerInterface $logger, \ClassyLlama\Credova\Helper\Api $apiHelper, $applicationId = null)
    {
        parent::__construct($clientFactory, $configHelper, $logger, $apiHelper);
        $this->applicationId = $applicationId;
    }

    /**
     * Get request path
     *
     * @return string
     */
    protected function getPath(): string
    {
        return sprintf(self::PATH, $this->applicationId);
    }

    protected function getHeaders(): array
    {
        $headers = parent::getHeaders();
        // Need to set this or we get a length error due to there being no body
        $headers['Content-Length'] = 0;

        return $headers;
    }

    /**
     * Get request method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return \Zend\Http\Request::METHOD_POST;
    }

    public function getResponseData(): array
    {
        $response = $this->getResponse();

        $data = json_decode($response->getBody(), true);

        if($data === null) {
            return [];
        }

        return $data;
    }
}
