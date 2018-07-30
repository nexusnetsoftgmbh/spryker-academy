<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Persistence;

use Spryker\Zed\Kernel\Persistence\QueryContainer\QueryContainerInterface;

interface NxsHelloSprykerQueryContainerInterface extends QueryContainerInterface
{
    /**
     * @return \Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker|\Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQuery
     */
    public function createHelloSpryker();
}
