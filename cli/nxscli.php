<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

Xervice\Core\Locator\Locator::getInstance()->console()->facade()->runApplication();