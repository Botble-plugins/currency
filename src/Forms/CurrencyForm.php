<?php

namespace Botble\Currency\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Currency\Http\Requests\CurrencyRequest;
use Botble\Currency\Models\Currency;

class CurrencyForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->setupModel(new Currency())
            ->setValidatorClass(CurrencyRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'required' => true,
                'choices' => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
