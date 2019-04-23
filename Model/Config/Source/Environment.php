<?php
/**
 * @category    ClassyLlama
 * @copyright   Copyright (c) 2019 Classy Llama Studios, LLC
 * @author      sean.templeton
 */

namespace ClassyLlama\Credova\Model\Config\Source;

class Environment implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'Localhost', 'label' => __('Localhost')],
            ['value' => 'Production', 'label' => __('Production')],
            ['value' => 'Sandbox', 'label' => __('Sandbox')],
            ['value' => 'Staging', 'label' => __('Staging')],
            ['value' => 'Test', 'label' => __('Test')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'Localhost' => __('Localhost'),
            'Production' => __('Production'),
            'Sandbox' => __('Sandbox'),
            'Staging' => __('Staging'),
            'Test' => __('Test')
        ];
    }
}
