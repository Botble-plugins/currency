<?php
namespace Botble\Currency\Services;
use Botble\Currency\Models\Currency;

class CurrencyService
{
    public function __construct(public Currency $currency)
    {}

    public function updateDefault(Currency $currency)
    {
        $this->currency->query()->update(['default' => 0]);

        $currency->is_default = 1;
        return $currency->save();
    }
}
