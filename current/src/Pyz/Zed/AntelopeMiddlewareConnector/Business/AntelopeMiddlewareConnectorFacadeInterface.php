<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeMiddlewareConnector\Business;


use Generated\Shared\Transfer\TranslatorConfigTransfer;

/**
 * @method \Pyz\Zed\AntelopeMiddlewareConnector\Business\AntelopeMiddlewareConnectorBusinessFactory getFactory()
 */
interface AntelopeMiddlewareConnectorFacadeInterface
{
    /**
     * @return \Generated\Shared\Transfer\TranslatorConfigTransfer
     */
    public function getAntelopeTranslatorConfig(): TranslatorConfigTransfer;
}
