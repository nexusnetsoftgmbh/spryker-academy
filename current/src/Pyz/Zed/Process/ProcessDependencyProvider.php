<?php
declare(strict_types=1);

namespace Pyz\Zed\Process;


use Pyz\Zed\AntelopeMiddlewareConnector\Communication\Plugin\Configuration\AntelopeMiddlewareConnectorConfigurationProfilePlugin;
use SprykerMiddleware\Zed\Process\ProcessDependencyProvider as SpyProcessDependencyProvider;

class ProcessDependencyProvider extends SpyProcessDependencyProvider
{
    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ConfigurationProfilePluginInterface[]
     */
    protected function getConfigurationProfilePluginsStack(): array
    {
        return [
            new AntelopeMiddlewareConnectorConfigurationProfilePlugin(),
        ];
    }
}
