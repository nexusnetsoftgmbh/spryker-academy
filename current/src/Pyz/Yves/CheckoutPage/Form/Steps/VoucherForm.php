<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \SprykerShop\Yves\CheckoutPage\CheckoutPageFactory getFactory()
 */
class VoucherForm extends AbstractType
{
    const FIELD_ID_VOUCHER_METHOD = 'voucherCode';

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'voucherForm';
    }


    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addVoucherMethods($builder, $options);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return $this
     */
    protected function addVoucherMethods(FormBuilderInterface $builder, array $options)
    {
        $builder->add(self::FIELD_ID_VOUCHER_METHOD, TextType::class, [
            'attr' => array('class' => 'voucher')
        ]);

        return $this;
    }
}
