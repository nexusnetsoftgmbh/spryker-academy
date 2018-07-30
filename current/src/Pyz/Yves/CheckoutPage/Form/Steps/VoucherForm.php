<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \SprykerShop\Yves\CheckoutPage\CheckoutPageFactory getFactory()
 */
class VoucherForm extends AbstractType
{
    const FORM_NAME                = 'voucherForm';
    const FIELD_VOUCHER_DISCOUNTS  = 'voucherDiscounts';
    const FIELD_VOUCHER_ADD_BUTTON = 'voucherButton';

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return static::FORM_NAME;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction('/checkout/add-voucher');

        $this->addVoucherCodeField($builder);
//        $this->addVoucherAddAction($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addVoucherCodeField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_VOUCHER_DISCOUNTS, TextType::class, [
            'label'    => 'page.checkout.finalize.enter-voucher',
            'required' => false,
        ]);

        return $this;
    }

    protected function addVoucherAddAction(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_VOUCHER_ADD_BUTTON, ButtonType::class, [
            'attr' => array('class' => 'save'),
        ]);

        return $this;
    }


}
