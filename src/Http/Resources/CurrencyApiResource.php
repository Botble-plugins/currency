<?php

namespace Botble\Currency\Http\Resources;

use Botble\Currency\Models\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Currency
 */
class CurrencyApiResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->title,
        ];
    }
}
