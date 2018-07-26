<?php


namespace Pyz\Yves\NxsHelloSpryker\Provider;


use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class HelloSprykerControllerProvider extends AbstractYvesControllerProvider
{
    protected function defineControllers(Application $app)
    {
        $this->createController('/nxs-hello-spryker', 'nxs-hello-spryker', 'NxsHelloSpryker', 'HelloSpryker', 'index');
    }

}