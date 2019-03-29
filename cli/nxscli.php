<?php

use Xervice\Core\Business\Model\Locator\Locator;

require __DIR__ . '/../vendor/autoload.php';

Locator::getInstance()->console()->facade()->runApplication();