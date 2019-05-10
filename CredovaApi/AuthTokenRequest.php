<?php

namespace ClassyLlama\Credova\CredovaApi;

class AuthTokenRequest extends \ClassyLlama\Credova\CredovaApi\RequestAbstract
{
    const PATH = 'v2/token';
    const TOKEN_KEY = 'jwt';
    const CACHE_KEY = 'classyllama.credova.token';

    /**
     * Override content type from abstract
     */
    const CONTENT_TYPE = 'application/x-www-form-urlencoded';
    /**
     * @var Magento\Framework\App\CacheInterface
     */
    private $cache;

    public function __construct(\Zend\Http\ClientFactory $clientFactory, \ClassyLlama\Credova\Helper\Config $configHelper, \Psr\Log\LoggerInterface $logger, \Magento\Framework\App\CacheInterface $cache)
    {
        parent::__construct($clientFactory, $configHelper, $logger);
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPath(): string
    {
        return static::PATH;
    }

    /**
     * {@inheritdoc}
     */
    protected function getMethod(): string
    {
        return \Zend\Http\Request::METHOD_POST;
    }

    /**
     * Add post data
     *
     * {@inheritdoc}
     */
    protected function prepareRequest(\Zend\Http\Client $client)
    {
        parent::prepareRequest($client);

        $client->setParameterPost([
            'username' => $this->configHelper->getCredovaApiUsername(),
            'password' => $this->configHelper->getCredovaApiPassword()
        ]);
    }

    /**
     * Get token string from response
     *
     * @return string
     * @throws \ClassyLlama\Credova\Exception\CredovaApiException
     */
    public function getToken(): string
    {
        $token = $this->cache->load(self::CACHE_KEY);

        if($token !== false) {
            return $token;
        }

        $data = $this->getResponseData();

        if (!isset($data[self::TOKEN_KEY])) {
            throw new \ClassyLlama\Credova\Exception\CredovaApiException(__('Access token not found.'));
        }

        // Set the cache expiration to the exp timestamp in the token, minus 5 minutes to ensure we don't have rejected token errors
        $expirationInSeconds = json_decode(base64_decode($data[self::TOKEN_KEY]), true)['exp'] - time() - (5 * 60);

        $this->cache->save($data[self::TOKEN_KEY], self::CACHE_KEY, null, $expirationInSeconds);

        return $data[self::TOKEN_KEY];
    }
}
