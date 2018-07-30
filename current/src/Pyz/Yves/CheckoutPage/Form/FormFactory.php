<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\VoucherForm;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerFormFactory;

class FormFactory extends SprykerFormFactory
{

    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createVoucherFormCollection()
    {
        return $this->createFormCollection($this->getVoucherFormTypes());
    }

    /**
     * @return string[]
     */
    public function getVoucherFormTypes()
    {
        return [
            $this->getVoucherForm(),
        ];
    }

    /**
     * @return string
     */
    public function getVoucherForm()
    {
        return VoucherForm::class;
    }


}
