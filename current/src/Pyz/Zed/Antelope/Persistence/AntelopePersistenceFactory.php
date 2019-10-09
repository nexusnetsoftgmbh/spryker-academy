<?php
declare(strict_types=1);

namespace Pyz\Zed\Antelope\Persistence;


use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class AntelopePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Antelope\Persistence\PyzAntelopeQuery
     */
    public function createPyzAntelopeQuery()
    {
        return PyzAntelopeQuery::create();
    }
}