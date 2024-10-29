<div class="swatches-container">
    <div class="header">
        <div class="swatch-item">
            {{ trans('plugins/currency::currency.code') }}
        </div>
        <div class="swatch-item">
            {{ trans('plugins/currency::currency.symbol') }}
        </div>
        <div class="swatch-item swatch-decimals">
            {{ trans('plugins/currency::currency.number_of_decimals') }}
        </div>
        <div class="swatch-item swatch-exchange-rate">
            {{ trans('plugins/currency::currency.exchange_rate') }}
        </div>
        <div class="swatch-item swatch-is-prefix-symbol">
            {{ trans('plugins/currency::currency.is_prefix_symbol') }}
        </div>
        <div class="swatch-is-default">
            {{ trans('plugins/currency::currency.is_default') }}
        </div>
        <div class="remove-item">{{ trans('plugins/currency::currency.remove') }}</div>
    </div>

    <ul class="swatches-list"></ul>

    <div class="d-flex justify-content-between w-100 align-items-center">
        <x-core::form.helper-text>
            {{ trans('plugins/currency::currency.instruction') }}
        </x-core::form.helper-text>

        <a class="js-add-new-attribute" href="javascript:void(0)">
            {{ trans('plugins/currency::currency.new_currency') }}
        </a>
    </div>
</div>
