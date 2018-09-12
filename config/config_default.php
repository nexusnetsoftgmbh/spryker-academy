<?php

use Nexus\CustomCommand\CustomCommandConfig;
use Nexus\Dumper\DumperConfig;
use Xervice\Core\CoreConfig;
use Xervice\DataProvider\DataProviderConfig;

$config[CoreConfig::PROJECT_LAYER_NAMESPACE] = 'Nexus';

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/cli/Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/vendor/nexusnetsoftgmbh/*/src/*/*/Schema/'
];
