<?php
namespace Botble\Currency\Services;
use Botble\Currency\Models\Currency;

class CurrencyService
{
    public function __construct(public Currency $currency)
    {}

    public function updateDefault(int|string $currencyId)
    {
        $this->currency
                ->query()
                ->update(['is_default' => 0]);

        $currency = $this->currency->find($currencyId);
        $currency->is_default = 1;
        return $currency->save();
    }
}
