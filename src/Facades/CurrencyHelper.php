<?php

namespace Botble\Currency\Facades;

use Botble\Currency\Supports\CurrencyHelper as BaseCurrencyHelper;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void setApplicationCurrency(\Botble\Ecommerce\Models\Currency $currency)
 * @method static \Botble\Ecommerce\Models\Currency|null getApplicationCurrency()
 * @method static \Botble\Ecommerce\Models\Currency|null getDefaultCurrency()
 * @method static \Illuminate\Support\Collection currencies()
 * @method static string|null detectedCurrencyCode()
 * @method static array countryCurrencies()
 * @method static array currencyCodes()
 *
 * @see \Botble\Ecommerce\Supports\CurrencyHelper
 */
class CurrencyHelper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BaseCurrencyHelper::class;
    }
}
