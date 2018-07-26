<?php


namespace Pyz\Yves\NxsHelloSpryker\Controller;


use Spryker\Yves\Kernel\Controller\AbstractController;

class HelloSprykerController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        return ['reversedString' => $this->getClient()->getReversedString()];
    }
}