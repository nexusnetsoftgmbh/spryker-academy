<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeSearch\Business;


use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchBusinessFactory getFactory()
 */
class AntelopeSearchFacade extends AbstractFacade
{
    /**
     * @param int $idAntelope
     */
    public function publish(int $idAntelope): void
    {
        $this->getFactory()
             ->createAntelopeSearchWriter()
             ->publish($idAntelope);
    }
}