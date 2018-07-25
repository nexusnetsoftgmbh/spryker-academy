<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * Class IndexController
 * @package Pyz\Zed\NxsHelloSpryker\Communication\Controller
 * @method \Pyz\Zed\NxsHelloSpryker\Business\NxsHelloSprykerFacade getFacade()
 */
class IndexController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction(): array
    {
        return ['reversedString' => $this->getFacade()->getReversedString()];
    }
}
