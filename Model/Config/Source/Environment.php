<?php

namespace ClassyLlama\Credova\Model\Config\Source;

class Environment implements \Magento\Framework\Option\ArrayInterface
{
    const ENVIRONMENT_STAGE = 'stage';
    const ENVIRONMENT_PROD = 'prod';

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::ENVIRONMENT_STAGE,
                'label' => __('Stage')
            ],
            [
                'value' => self::ENVIRONMENT_PROD,
                'label' => __('Production')
            ]
        ];
    }
}
