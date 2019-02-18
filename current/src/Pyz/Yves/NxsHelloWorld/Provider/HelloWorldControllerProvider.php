<?php


namespace Pyz\Yves\NxsHelloWorld\Provider;


use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class HelloWorldControllerProvider extends AbstractYvesControllerProvider
{
    protected function defineControllers(Application $app)
    {
        $this->createController('/helloworld', 'helloworld', 'NxsHelloWorld', 'Index', 'index');
    }

}