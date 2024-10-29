<div class="row">
    <x-core-setting::radio
        class="switch_api_provider"
        name="exchange_rate_api_provider"
        :label="trans('plugins/currency::setting.currency.form.exchange_rate.api_provider')"
        :options="[
            'none' => trans('plugins/currency::setting.currency.form.exchange_rate.none'),
            'api_layer' => trans('plugins/currency::setting.currency.form.exchange_rate.provider.api_layer'),
            'open_exchange_rate' => trans(
                'plugins/currency::setting.currency.form.exchange_rate.provider.open_exchange_rate',
            ),
        ]"
        :value="get_currency_setting('exchange_rate_api_provider', 'none')"
        data-bb-toggle="collapse"
        data-bb-target=".api-provider-settings"
    />
</div>

<x-core::form.fieldset
    class="api-provider-settings"
    data-bb-value="api_layer"
    @style(['display: none' => get_currency_setting('exchange_rate_api_provider') !== 'api_layer'])
>
    <x-core::form.text-input
        name="api_layer_api_key"
        :label="trans('plugins/currency::setting.currency.form.api_key')"
        :value="get_currency_setting('api_layer_api_key')"
        placeholder="********"
        :helperText="trans('plugins/currency::setting.currency.form.api_key_helper', [
            'link' => Html::link(
                'https://apilayer.com/marketplace/exchangerates_data-api',
                attributes: ['target' => '_blank'],
            ),
        ])"
    />

    @if (
        get_currency_setting('exchange_rate_api_provider') === 'api_layer'
        && get_currency_setting('api_layer_api_key')
    )

        <div class="btn-list">
            <x-core::button
                type="button"
                id="btn-update-currencies"
                data-url="{{ route('currency.setting.update-currencies-from-exchange-api') }}"
            >
                <x-core::icon name="ti ti-download" />
                {{ trans('plugins/currency::setting.currency.form.update_currency_rates') }}
            </x-core::button>

            <x-core::button
                type="button"
                id="btn-clear-cache-rates"
                data-url="{{ route('currency.setting.clear-cache-currency-rates') }}"
            >
                <x-core::icon name="ti ti-refresh" />
                {{ trans('plugins/currency::setting.currency.form.clear_cache_rates') }}
            </x-core::button>
        </div>
    @endif
</x-core::form.fieldset>

<x-core::form.fieldset
    class="api-provider-settings"
    data-bb-value="open_exchange_rate"
    @style(['display: none' => get_currency_setting('exchange_rate_api_provider', 'none') !== 'open_exchange_rate'])
>
    <x-core::form.text-input
        name="open_exchange_app_id"
        :label="trans('plugins/currency::setting.currency.form.exchange_rate.open_exchange_app_id')"
        :value="get_currency_setting('open_exchange_app_id')"
        placeholder="********"
        :helperText="trans('plugins/currency::setting.currency.form.api_key_helper', [
            'link' => Html::link('https://openexchangerates.org/', attributes: ['target' => '_blank']),
        ])"
    />

    @if (
        get_currency_setting('exchange_rate_api_provider', 'none') == 'open_exchange_rate'
        && get_currency_setting('open_exchange_app_id')
    )

        <div class="btn-list">
            <x-core::button
                type="button"
                id="btn-update-currencies"
                data-url="{{ route('currency.setting.update-currencies-from-exchange-api') }}"
            >
                <x-core::icon name="ti ti-download" />
                {{ trans('plugins/currency::setting.currency.form.update_currency_rates') }}
            </x-core::button>

            <x-core::button
                type="button"
                id="btn-clear-cache-rates"
                data-url="{{ route('currency.setting.clear-cache-currency-rates') }}"
            >
                <x-core::icon name="ti ti-refresh" />
                {{ trans('plugins/currency::setting.currency.form.clear_cache_rates') }}
            </x-core::button>
        </div>
    @endif
</x-core::form.fieldset>
