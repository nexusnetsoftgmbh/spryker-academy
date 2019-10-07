<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a devtest environment.
 */

use Monolog\Logger;
use Pyz\Shared\Console\ConsoleConstants;
use Pyz\Shared\Scheduler\SchedulerConfig;
use Pyz\Yves\ShopApplication\YvesBootstrap;
use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Application\Log\Config\SprykerLoggerConfig;
use Spryker\Shared\Config\ConfigConstants;
use Spryker\Shared\DocumentationGeneratorRestApi\DocumentationGeneratorRestApiConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\ErrorHandler\ErrorRenderer\WebExceptionErrorRenderer;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\GlueApplication\GlueApplicationConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Oauth\OauthConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\RabbitMq\RabbitMqEnv;
use Spryker\Shared\Router\RouterConstants;
use Spryker\Shared\Scheduler\SchedulerConstants;
use Spryker\Shared\SchedulerJenkins\SchedulerJenkinsConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\SessionRedis\SessionRedisConfig;
use Spryker\Shared\StorageRedis\StorageRedisConstants;
use Spryker\Shared\Testify\TestifyConstants;
use Spryker\Shared\WebProfiler\WebProfilerConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

// ---------- General
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker';

// ---------- ZedRequest
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = true;
$config[ZedRequestConstants::SET_REPEAT_DATA] = true;
$config[ZedRequestConstants::YVES_REQUEST_REPEAT_DATA_PATH] = APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/' . APPLICATION_ENV . '/yves-requests';

// ---------- Testify
$config[TestifyConstants::BOOTSTRAP_CLASS_YVES] = YvesBootstrap::class;
$config[TestifyConstants::BOOTSTRAP_CLASS_ZED] = ZedBootstrap::class;

// ---------- Propel
$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelConstants::ZED_DB_HOST] = getenv('POSTGRESQL_SERVER');
$config[PropelConstants::ZED_DB_PORT] = 5432;

// ---------- Redis
$config[StorageRedisConstants::STORAGE_REDIS_DATABASE] = 3;

// ---------- Session
$config[SessionConstants::SESSION_IS_TEST] = (bool)getenv("SESSION_IS_TEST");
$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionRedisConfig::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionRedisConfig::SESSION_HANDLER_REDIS;

// ---------- Elasticsearch
$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '_devtest';

// ---------- RabbitMQ
$config[RabbitMqEnv::RABBITMQ_API_HOST] = getenv('RABBITMQ_SERVER');
$config[RabbitMqEnv::RABBITMQ_API_PORT] = '15672';
$config[RabbitMqEnv::RABBITMQ_API_USERNAME] = getenv('RABBITMQ_ADMIN_USER');
$config[RabbitMqEnv::RABBITMQ_API_PASSWORD] = getenv('RABBITMQ_ADMIN_PW');


// ---------- Logging
$config[LogConstants::LOG_FILE_PATH] = APPLICATION_ROOT_DIR . '/data/logs';

// ---------- Scheduler
$config[SchedulerConstants::ENABLED_SCHEDULERS] = [
    SchedulerConfig::SCHEDULER_JENKINS,
];
$config[SchedulerJenkinsConstants::JENKINS_CONFIGURATION] = [
    SchedulerConfig::SCHEDULER_JENKINS => [
        'host' => sprintf(
            'http://%s:%s',
            getenv('JENKINS_SERVER'),
            '8080'
        ),
    ],
];

// ---------- ErrorHandler
$config[ErrorHandlerConstants::ERROR_RENDERER] = WebExceptionErrorRenderer::class;

// ---------- Logging
$config[LogConstants::LOG_LEVEL] = Logger::CRITICAL;
$config[LogConstants::LOGGER_CONFIG] = SprykerLoggerConfig::class;

$config[WebProfilerConstants::ENABLE_WEB_PROFILER]
    = $config[ConfigConstants::ENABLE_WEB_PROFILER]
    = false;

$config[GlueApplicationConstants::GLUE_APPLICATION_REST_DEBUG] = true;

// ----------- OAUTH
$config[OauthConstants::PRIVATE_KEY_PATH] = 'file://' . APPLICATION_ROOT_DIR . '/config/Zed/dev_only_private.key';
$config[OauthConstants::PUBLIC_KEY_PATH] = 'file://' . APPLICATION_ROOT_DIR . '/config/Zed/dev_only_public.key';
$config[OauthConstants::ENCRYPTION_KEY] = 'lxZFUEsBCJ2Yb14IF2ygAHI5N4+ZAUXXaSeeJm6+twsUmIen';
$config[OauthConstants::OAUTH_CLIENT_IDENTIFIER] = 'frontend';
$config[OauthConstants::OAUTH_CLIENT_SECRET] = 'abc123';

// ---------- Event
$config[EventConstants::EVENT_CHUNK] = 500;

// ---------- Kernel
$config[KernelConstants::ENABLE_CONTAINER_OVERRIDING] = true;

// ---------- Console
$config[ConsoleConstants::ENABLE_DEVELOPMENT_CONSOLE_COMMANDS] = true;

// ----------- Documentation generator
$config[DocumentationGeneratorRestApiConstants::ENABLE_REST_API_DOCUMENTATION_GENERATION] = true;

// ---------- Routing
$config[ApplicationConstants::YVES_SSL_ENABLED] = false;
$config[ApplicationConstants::ZED_SSL_ENABLED] = false;

$config[RouterConstants::YVES_IS_SSL_ENABLED] = false;
$config[RouterConstants::ZED_IS_SSL_ENABLED] = false;
