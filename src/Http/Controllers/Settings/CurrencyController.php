<?php

namespace Botble\Currency\Http\Controllers\Settings;

use Botble\Base\Forms\FormBuilder;
use Botble\Currency\Facades\CurrencyHelper;
use Botble\Currency\Forms\Settings\CurrencySettingForm;
use Botble\Currency\Http\Requests\Settings\CurrencySettingRequest;
use Botble\Currency\Services\StoreCurrenciesService;
use Botble\Setting\Http\Controllers\SettingController;

class CurrencyController extends SettingController
{
    public function index()
    {
        $this->pageTitle(trans('plugins/currency::currency.currencies'));

        $form = CurrencySettingForm::create();

        return view('plugins/currency::settings.currency', compact('form'));
    }

    public function edit(FormBuilder $formBuilder)
    {
        $this->pageTitle('Page title');

        return $formBuilder->create(CurrencySettingForm::class)->renderForm();
    }

    public function update(CurrencySettingRequest $request, StoreCurrenciesService $service)
    {
        $this->saveSettings($request->except([
            'currencies',
            'currencies_data',
            'deleted_currencies',
        ]), CurrencyHelper::getSettingPrefix());

        $currencies = $request->validated('currencies') ?: [];
        if ($currencies) {
            $currencies = json_decode($currencies, true);
        }

        $response = $this->httpResponse()
            ->setNextUrl(route('settings.currencies'));

        if (! $currencies) {
            return $response
                ->setError()
                ->setMessage(trans('plugins/currency::currency.require_at_least_one_currency'));
        }

        $deletedCurrencies = $request->validated('deleted_currencies') ?: [];
        if ($deletedCurrencies) {
            $deletedCurrencies = json_decode($deletedCurrencies, true);
        }

        $storedCurrencies = $service->execute($currencies, $deletedCurrencies);

        if ($storedCurrencies['error']) {
            return $response
                ->setError()
                ->setMessage($storedCurrencies['message']);
        }

        return $response
            ->withUpdatedSuccessMessage();
    }
}
