<?php

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'ClassyLlama_Credova',
    isset($file) ? dirname($file) : __DIR__
);
