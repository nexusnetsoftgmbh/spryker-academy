<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\CheckoutPage\Plugin\Provider\CheckoutPageControllerProvider as SprykerCheckoutPageControllerProvider;

class CheckoutPageControllerProvider extends SprykerCheckoutPageControllerProvider
{
    const CHECKOUT_VOUCHER = 'checkout-voucher';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        parent::defineControllers($app);
        $this->addVoucherStepRoute();
    }

    /**
     * @return $this
     */
    protected function addVoucherStepRoute(): self
    {
        $this->createController('/{checkout}/voucher', self::CHECKOUT_VOUCHER, 'CheckoutPage', 'Checkout', 'voucher')
            ->assert('checkout', $this->getAllowedLocalesPattern() . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        return $this;
    }

}
