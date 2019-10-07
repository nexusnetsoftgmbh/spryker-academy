<?php

use Spryker\Client\RabbitMq\Model\RabbitMqAdapter;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\GlueApplication\GlueApplicationConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Queue\QueueConfig;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\RabbitMq\RabbitMqEnv;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$domain = getenv('VM_PROJECT') ?: 'suite';

// ---------- Yves host
$config[ApplicationConstants::HOST_YVES] = getenv('YVES_AT_DOMAIN');
$config[ApplicationConstants::PORT_YVES] = '';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::BASE_URL_YVES] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_YVES]
);
$config[ApplicationConstants::BASE_URL_SSL_YVES] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_SSL_YVES]
);
$config[ProductManagementConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[NewsletterConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[CustomerConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];

// ---------- Zed host
$config[ApplicationConstants::HOST_ZED] = getenv('ZED_AT_DOMAIN');
$config[ApplicationConstants::PORT_ZED] = '';
$config[ApplicationConstants::PORT_SSL_ZED] = '';
$config[ApplicationConstants::BASE_URL_ZED] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_ZED]
);
$config[ApplicationConstants::BASE_URL_SSL_ZED] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_SSL_ZED]
);
$config[ZedRequestConstants::HOST_ZED_API] = $config[ApplicationConstants::HOST_ZED];
$config[ZedRequestConstants::BASE_URL_ZED_API] = $config[ApplicationConstants::BASE_URL_ZED];
$config[ZedRequestConstants::BASE_URL_SSL_ZED_API] = $config[ApplicationConstants::BASE_URL_SSL_ZED];

// ---------- Trusted hosts
$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [
    $config[ApplicationConstants::HOST_YVES],
];

// ---------- Assets / Media
$config[ApplicationConstants::BASE_URL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_SSL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_SSL_YVES];

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];

// ---------- Events
$config[EventConstants::LOG_FILE_PATH] = APPLICATION_ROOT_DIR . '/data/AT/logs/application_events.log';

// ----------- Glue Application
$config[GlueApplicationConstants::GLUE_APPLICATION_DOMAIN] = getenv('GLUE_AT_DOMAIN');
$config[GlueApplicationConstants::GLUE_APPLICATION_CORS_ALLOW_ORIGIN] = getenv('GLUE_AT_DOMAIN');

// ----------- RabbitMq
$config[RabbitMqEnv::RABBITMQ_CONNECTIONS] = [
    'DE' => [
        RabbitMqEnv::RABBITMQ_CONNECTION_NAME => 'DE-connection',
        RabbitMqEnv::RABBITMQ_HOST => getenv('RABBITMQ_SERVER'),
        RabbitMqEnv::RABBITMQ_PORT => '5672',
        RabbitMqEnv::RABBITMQ_PASSWORD => getenv('RABBITMQ_VHOST_DE_PASS'),
        RabbitMqEnv::RABBITMQ_USERNAME => getenv('RABBITMQ_VHOST_DE_USER'),
        RabbitMqEnv::RABBITMQ_VIRTUAL_HOST => getenv('RABBITMQ_VHOST_DE'),
        RabbitMqEnv::RABBITMQ_STORE_NAMES => ['DE'],
    ],
    'AT' => [
        RabbitMqEnv::RABBITMQ_CONNECTION_NAME => 'AT-connection',
        RabbitMqEnv::RABBITMQ_HOST => getenv('RABBITMQ_SERVER'),
        RabbitMqEnv::RABBITMQ_PORT => '5672',
        RabbitMqEnv::RABBITMQ_PASSWORD => getenv('RABBITMQ_VHOST_AT_PASS'),
        RabbitMqEnv::RABBITMQ_USERNAME => getenv('RABBITMQ_VHOST_AT_USER'),
        RabbitMqEnv::RABBITMQ_VIRTUAL_HOST => getenv('RABBITMQ_VHOST_AT'),
        RabbitMqEnv::RABBITMQ_STORE_NAMES => ['AT'],
        RabbitMqEnv::RABBITMQ_DEFAULT_CONNECTION => true,
    ],
    'US' => [
        RabbitMqEnv::RABBITMQ_CONNECTION_NAME => 'US-connection',
        RabbitMqEnv::RABBITMQ_HOST => getenv('RABBITMQ_SERVER'),
        RabbitMqEnv::RABBITMQ_PORT => '5672',
        RabbitMqEnv::RABBITMQ_PASSWORD => getenv('RABBITMQ_VHOST_US_PASS'),
        RabbitMqEnv::RABBITMQ_USERNAME => getenv('RABBITMQ_VHOST_US_USER'),
        RabbitMqEnv::RABBITMQ_VIRTUAL_HOST => getenv('RABBITMQ_VHOST_US'),
        RabbitMqEnv::RABBITMQ_STORE_NAMES => ['US'],
    ],
];

$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION_DEFAULT] = [
    QueueConfig::CONFIG_QUEUE_ADAPTER => RabbitMqAdapter::class,
    QueueConfig::CONFIG_MAX_WORKER_NUMBER => 2,
];

$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION][EventConstants::EVENT_QUEUE][QueueConfig::CONFIG_MAX_WORKER_NUMBER] = 2;

// ----------- HTTP Security
$config[KernelConstants::DOMAIN_WHITELIST] = [
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::HOST_ZED],
];
