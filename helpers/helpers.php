<?php
use Botble\Currency\Facades\CurrencyHelper;

if (! function_exists('get_currency_setting')) {
    function get_currency_setting(string $key, bool|int|string|null $default = ''): array|int|string|null
    {
        return setting(CurrencyHelper::getSettingPrefix() . $key, $default);
    }
}
