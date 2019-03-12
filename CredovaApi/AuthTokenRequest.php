<?php

namespace ClassyLlama\Credova\CredovaApi;

class AuthTokenRequest extends \ClassyLlama\Credova\CredovaApi\RequestAbstract
{
    const PATH = 'v2/token';
    const TOKEN_KEY = 'jwt';

    /**
     * Override content type from abstract
     */
    const CONTENT_TYPE = 'application/x-www-form-urlencoded';

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
    public function getToken() : string
    {
        $data = $this->getResponseData();

        if (!isset($data[self::TOKEN_KEY])) {
            throw new \ClassyLlama\Credova\Exception\CredovaApiException(__('Access token not found.'));
        }

        return $data[self::TOKEN_KEY];
    }
}
