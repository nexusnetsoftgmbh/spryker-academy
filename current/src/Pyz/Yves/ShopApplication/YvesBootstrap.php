<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ShopApplication;

use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Spryker\Shared\Application\ServiceProvider\FormFactoryServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\CookieServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\YvesHstsServiceProvider;
use Spryker\Yves\Messenger\Plugin\Provider\FlashMessengerServiceProvider;
use Spryker\Yves\Monitoring\Plugin\ServiceProvider\MonitoringRequestTransactionServiceProvider;
use Spryker\Yves\Session\Plugin\ServiceProvider\SessionServiceProvider as SprykerSessionServiceProvider;
use Spryker\Yves\Storage\Plugin\Provider\StorageCacheServiceProvider;
use Spryker\Yves\ZedRequest\Plugin\ServiceProvider\ZedRequestHeaderServiceProvider;
use SprykerShop\Yves\AgentPage\Plugin\Provider\AgentPageSecurityServiceProvider;
use SprykerShop\Yves\CustomerPage\Plugin\Provider\CustomerSecurityServiceProvider;
use SprykerShop\Yves\ErrorPage\Plugin\Provider\ErrorPageServiceProvider;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AutoloaderCacheServiceProvider;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\ShopControllerEventServiceProvider;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\YvesExceptionServiceProvider;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\YvesSecurityServiceProvider;
use SprykerShop\Yves\ShopApplication\YvesBootstrap as SprykerYvesBootstrap;
use SprykerShop\Yves\WebProfilerWidget\Plugin\ServiceProvider\WebProfilerWidgetServiceProvider;

class YvesBootstrap extends SprykerYvesBootstrap
{
    /**
     * @return void
     */
    protected function registerServiceProviders()
    {
        $this->application->register(new StorageCacheServiceProvider());
        $this->application->register(new ZedRequestHeaderServiceProvider());
        $this->application->register(new ShopControllerEventServiceProvider());
        $this->application->register(new SessionServiceProvider());
        $this->application->register(new SprykerSessionServiceProvider());
        $this->application->register(new SecurityServiceProvider());
        $this->application->register(new CustomerSecurityServiceProvider());
        $this->application->register(new YvesSecurityServiceProvider());
        $this->application->register(new YvesExceptionServiceProvider());
        $this->application->register(new ErrorPageServiceProvider());
        $this->application->register(new MonitoringRequestTransactionServiceProvider());
        $this->application->register(new CookieServiceProvider());
        $this->application->register(new UrlGeneratorServiceProvider());
        $this->application->register(new RememberMeServiceProvider());
        $this->application->register(new ValidatorServiceProvider());
        $this->application->register(new FormServiceProvider());
        $this->application->register(new HttpFragmentServiceProvider());
        $this->application->register(new FlashMessengerServiceProvider());
        $this->application->register(new WebProfilerWidgetServiceProvider());
        $this->application->register(new AutoloaderCacheServiceProvider());
        $this->application->register(new YvesHstsServiceProvider());
        $this->application->register(new FormFactoryServiceProvider());
        $this->application->register(new AgentPageSecurityServiceProvider()); # AgentFeature
    }
}
