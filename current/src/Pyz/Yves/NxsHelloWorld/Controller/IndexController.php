<?php


namespace Pyz\Yves\NxsHelloWorld\Controller;


use Spryker\Yves\Kernel\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function indexAction(){
        return [
            'helloWorld' => 'Hello World!'
        ];
    }
}