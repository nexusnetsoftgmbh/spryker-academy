<?php
declare(strict_types=1);

namespace Pyz\Zed\Antelope\Persistence;


use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

class AntelopeQueryContainer extends AbstractQueryContainer implements AntelopeQueryContainerInterface
{
    /**
     * @return \Orm\Zed\Antelope\Persistence\PyzAntelopeQuery
     */
    public function queryAntelopes(): PyzAntelopeQuery
    {
        return $this->getFactory()->createPyzAntelopeQuery();
    }
}