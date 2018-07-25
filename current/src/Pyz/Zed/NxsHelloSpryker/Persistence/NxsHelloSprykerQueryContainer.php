<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Persistence;

use Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerPersistenceFactory getFactory()
 */
class NxsHelloSprykerQueryContainer extends AbstractQueryContainer implements NxsHelloSprykerQueryContainerInterface
{
    /**
     * @return \Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker|\Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQuery
     */
    public function createHelloSpryker(): NxsHelloSprykerQuery
    {
        return $this->getFactory()->createHelloSpryker();
    }
}
