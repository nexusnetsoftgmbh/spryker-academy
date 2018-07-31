<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Catalog;

use Elastica\Query\FunctionScore;
use Elastica\Query\MultiMatch;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;
use Spryker\Client\Locale\LocaleClient;
use Spryker\Client\ProductStorage\ProductStorageClientInterface;

class CatalogFactory extends SprykerCatalogFactory
{
    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient(): CartClientInterface
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CART_CLIENT);
    }

    /**
     * @return \Spryker\Client\ProductStorage\ProductStorageClientInterface ctClientInterface
     */
    public function getProductClient(): ProductStorageClientInterface
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::PRODUCT_CLIENT);
    }

    /**
     * @return \Spryker\Client\Locale\LocaleClient
     */
    public function getLocaleClient(): LocaleClient
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::LOCALE_CLIENT);
    }

    /**
     * @return \Elastica\Query\FunctionScore
     */
    public function getFunctionScore(): FunctionScore
    {
        return $this->createFunctionScore();
    }

    /**
     * @return \Elastica\Query\MultiMatch
     */
    public function getMultimatch(): MultiMatch
    {
        return $this->createMultiMatch();
    }

    /**
     * @return \Elastica\Query\FunctionScore
     */
    protected function createFunctionScore(): FunctionScore
    {
        return new FunctionScore();
    }

    /**
     * @return \Elastica\Query\MultiMatch
     */
    protected function createMultiMatch(): MultiMatch
    {
        return new MultiMatch();
    }
}
