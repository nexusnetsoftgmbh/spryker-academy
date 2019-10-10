<?php
declare(strict_types=1);

namespace Pyz\Yves\AntelopeSearch\Plugin\Router;


use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class AntelopeSearchRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    const ANTELOPE_INDEX = 'antelope-search';

    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/antelope/{name}', static::ANTELOPE_INDEX, 'Index', 'indexAction');
        $routeCollection->add(static::ANTELOPE_INDEX, $route);

        return $routeCollection;
    }

}