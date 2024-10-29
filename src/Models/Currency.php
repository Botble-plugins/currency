<?php

namespace Botble\Currency\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Currency extends BaseModel
{
    protected $table = 'cms_currencies';

    protected $fillable = [
        'title',
        'symbol',
        'is_prefix_symbol',
        'decimals',
        'order',
        'is_default',
        'exchange_rate',
    ];

    protected $casts = [
        'is_prefix_symbol' => 'boolean',
        'is_default' => 'boolean',
        'exchange_rate' => 'double',
    ];
}
