<?php

namespace Botble\Currency;

use Illuminate\Support\Facades\Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('Currencies');
        Schema::dropIfExists('Currencies_translations');
    }
}
