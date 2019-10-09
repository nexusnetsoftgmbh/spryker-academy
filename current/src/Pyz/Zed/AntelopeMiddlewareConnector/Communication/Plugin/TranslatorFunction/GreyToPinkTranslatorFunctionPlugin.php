<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeMiddlewareConnector\Communication\Plugin\TranslatorFunction;


use Pyz\Zed\AntelopeMiddlewareConnector\Business\Translator\TranslatorFunction\GreyToPink;
use SprykerMiddleware\Zed\Process\Communication\Plugin\TranslatorFunction\AbstractGenericTranslatorFunctionPlugin;

class GreyToPinkTranslatorFunctionPlugin extends AbstractGenericTranslatorFunctionPlugin
{
    protected const NAME = 'GreyToPink';

    /**
     * @return string
     */
    public function getTranslatorFunctionClassName(): string
    {
        return GreyToPink::class;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::NAME;
    }
}
