<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeMiddlewareConnector\Communication;

use Pyz\Zed\AntelopeMiddlewareConnector\AntelopeMiddlewareConnectorDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface;
use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\TranslatorFunctionFactory;
use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\TranslatorFunctionFactoryInterface;
use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\TranslatorFunctionInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\StagePluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

class AntelopeMiddlewareConnectorCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return TranslatorFunctionInterface[]
     */
    public function getAntelopeTranslatorFunctions(): array
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_TRANSLATOR_FUNCTIONS);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface
     */
    public function getAntelopeInputStreamPlugin(): InputStreamPluginInterface
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_INPUT_STREAM_PLUGIN);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface
     */
    public function getAntelopeOutputStreamPlugin(): OutputStreamPluginInterface
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_OUTPUT_STREAM_PLUGIN);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface
     */
    public function getAntelopeIteratorPlugin(): ProcessIteratorPluginInterface
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_ITERATOR_PLUGIN);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface
     */
    public function getAntelopeLoggerConfigPlugin(): MiddlewareLoggerConfigPluginInterface
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_LOGGER_PLUGIN);
    }

    /**
     * @return StagePluginInterface[]
     */
    public function getAntelopeStagePluginStack(): array
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_STAGE_PLUGIN_STACK);
    }

    /**
     * @return ProcessConfigurationPluginInterface[]
     */
    public function getAntelopeProcesses(): array
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::ANTELOPE_PROCESSES);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface
     */
    public function getProcessFacade(): ProcessFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeMiddlewareConnectorDependencyProvider::FACADE_PROCESS);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\TranslatorFunctionFactory
     */
    public function createTranslatorFunctionFactory(): TranslatorFunctionFactoryInterface
    {
        return new TranslatorFunctionFactory();
    }
}
