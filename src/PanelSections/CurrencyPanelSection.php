<?php

namespace Botble\Currency\PanelSections;

use Botble\Base\PanelSections\PanelSection;

class CurrencyPanelSection extends PanelSection
{
    public function setup(): void
    {
        $this
            ->setId('settings.{id}')
            ->setTitle('{title}')
            ->withItems([
                //
            ]);
    }
}
