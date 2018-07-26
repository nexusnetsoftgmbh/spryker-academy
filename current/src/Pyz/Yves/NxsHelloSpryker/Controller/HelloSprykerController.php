<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NxsHelloSpryker\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * Class HelloSprykerController
 * @package Pyz\Yves\NxsHelloSpryker\Controller
 * @method \Pyz\Client\NxsHelloSpryker\NxsHelloSprykerClient getClient()
 */
class HelloSprykerController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction(): array
    {
        return ['reversedString' => $this->getClient()->getReversedString()];
    }
}
