<?php


namespace Pyz\Zed\NxsHelloSpryker\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * Class IndexController
 * @package Pyz\Zed\NxsHelloSpryker\Communication\Controller
 * @method \Pyz\Zed\NxsHelloSpryker\Business\NxsHelloSprykerFacade getFacade()
 */
class IndexController extends AbstractController
{
    public function indexAction()
    {
        return ['reversedString' => $this->getFacade()->getReversedString()];
    }
}