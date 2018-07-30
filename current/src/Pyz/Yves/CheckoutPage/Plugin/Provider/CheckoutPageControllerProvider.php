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
    const CHECKOUT_VOUCHER_ADD = 'checkout-voucher-add';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        parent::defineControllers($app);
        $this->addVoucherStepRoute();
        $this->addVoucherRoute();
        $this->addAndValidateCheckoutVoucherRoute();
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

    /**
     * @return $this
     */
    protected function addAndValidateCheckoutVoucherRoute(): self
    {
        $this->createController('/{checkout}/addvoucher', self::CHECKOUT_VOUCHER_ADD, 'CheckoutPage', 'Checkout', 'addAndValidateVoucher')
             ->assert('checkout', $this->getAllowedLocalesPattern() . 'checkout|checkout')
             ->value('checkout', 'checkout')
             ->method('GET|POST');

        return $this;
    }

    /**
     * @return $this
     */
    protected function addVoucherRoute(): self
    {
        $this->createController('/{checkout}/add-voucher', self::CHECKOUT_VOUCHER_ADD, 'CheckoutPage', 'Checkout', 'addVoucher')
             ->assert('checkout', $this->getAllowedLocalesPattern() . 'checkout|checkout')
             ->value('checkout', 'checkout')
             ->method('GET|POST');

        return $this;
    }
}
