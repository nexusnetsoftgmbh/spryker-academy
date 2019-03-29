<?php

use Nexus\Dumper\DumperConfig;
use Xervice\Core\CoreConfig;
use Xervice\DataProvider\DataProviderConfig;

$config[CoreConfig::PROJECT_NAMESPACES] = [
    'Nexus'
];

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/cli/Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/vendor/nexusnetsoftgmbh/*/src/*/*/Schema/'
];

$config[DumperConfig::SSH_HOST] = '5.9.82.139';
$config[DumperConfig::SSH_USER] = 'nxsdocker';
$config[DumperConfig::PROJECT_NAME] = 'sprykeracademy';
$config[DumperConfig::IMAGE_NAME] = 'nxs-docker-dumper';
$config[DumperConfig::DUMP_DIRECTORY] = dirname(__DIR__) . '/dump';