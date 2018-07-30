<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Persistence;

use Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainer getQueryContainer()
 * @method \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig getConfig()
 */
class NxsHelloSprykerPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQuery
     */
    public function createHelloSpryker(): NxsHelloSprykerQuery
    {
        return NxsHelloSprykerQuery::create();
    }
}
