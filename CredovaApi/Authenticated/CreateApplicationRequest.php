<?php

namespace ClassyLlama\Credova\CredovaApi\Authenticated;

use ClassyLlama\Credova\Exception\CredovaApiException;

class CreateApplicationRequest extends \ClassyLlama\Credova\CredovaApi\Authenticated\AuthenticatedRequestAbstract
{
    const PATH = 'v2/applications';

    protected $requestData = [];

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
     * {@inheritdoc}
     * @throws CredovaApiException
     */
    protected function getData() : array
    {
        if (empty($this->requestData)) {
            throw new CredovaApiException(__('Create application request without application data.'));
        }

        return $this->requestData;
    }


}
