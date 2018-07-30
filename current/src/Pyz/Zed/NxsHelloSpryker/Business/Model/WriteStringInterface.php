<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business\Model;

use Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker;

interface WriteStringInterface
{
    /**
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     *
     * @return \Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker
     */
    public function persist(): NxsHelloSpryker;
}
