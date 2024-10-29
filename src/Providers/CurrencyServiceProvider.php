<?php

namespace Botble\Currency\Providers;

use Botble\Base\Facades\Html;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Currency\Facades\CurrencyHelper;
use Botble\Setting\PanelSections\SettingCommonPanelSection;
use Illuminate\Foundation\AliasLoader;

class CurrencyServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('CurrencyHelper', CurrencyHelper::class);
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/currency')
            ->loadHelpers()
            ->loadAndPublishConfigurations(["permissions", 'general'])
            ->loadAndPublishTranslations()
            ->loadRoutes([
                'web',
            ])
            ->loadAndPublishViews()
            ->loadMigrations()
            ->publishAssets();

        PanelSectionManager::default()->beforeRendering(function () {
            PanelSectionManager::registerItem(
                SettingCommonPanelSection::class,
                fn () => PanelSectionItem::make('algoriza-currencies')
                    ->setTitle(trans('plugins/currency::currency.currencies'))
                    ->withDescription(trans('plugins/currency::currency.setting_description'))
                    ->withIcon('ti ti-list-details')
                    ->withPriority(0)
                    ->withRoute('settings.currencies')
            );
        });

        add_filter(BASE_FILTER_HEADER_LAYOUT_TEMPLATE, function ($assets) {
            $assets .= Html::style('vendor/core/plugins/currency/css/common.css');
            return $assets;
        });

        add_filter(BASE_FILTER_TOP_HEADER_LAYOUT, function ($options){
            return $options.view('plugins/currency::layouts.header.currency');
        });

        add_filter(BASE_FILTER_FOOTER_LAYOUT_TEMPLATE, function ($assets) {
            $assets .= Html::script('vendor/core/plugins/currency/js/common.js', ['defer']);
            return $assets;
        });
    }
}
