<?php


namespace Pyz\Zed\NxsHelloSpryker\Communication\Controller;


use Pyz\Zed\NxsHelloSpryker\Business\HelloSprykerFacade;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

class IndexController extends AbstractController
{
    /** @var HelloSprykerFacade */
    private $helloSpryker;

    public function indexAction()
    {
        if ($this->helloSpryker === null) {
            $this->helloSpryker = new HelloSprykerFacade();
        }

        return ['reversedString' => $this->helloSpryker->getReversedString()];
    }
}