<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeMiddlewareConnector\Business;


use Pyz\Zed\AntelopeMiddlewareConnector\Business\Translator\Dictionary\AntelopeDictionary;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\DictionaryInterface;

class AntelopeMiddlewareConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\DictionaryInterface
     */
    public function createAntelopeDictionary(): DictionaryInterface
    {
        return new AntelopeDictionary();
    }
}
