<?php
use Illuminate\Support\Facades\Route;
use Botble\Base\Facades\AdminHelper;

Route::group(['namespace' => 'Botble\Currency\Http\Controllers\Settings'], function () {
    AdminHelper::registerRoutes(function () {
        Route::group(['prefix' => 'setting'], function () {

            Route::get('currencies', [
                'as' => 'settings.currencies',
                'uses' => 'CurrencyController@index',
            ]);

            Route::put('currencies', [
                'as' => 'settings.currencies.update',
                'uses' => 'CurrencyController@update',
                'permission' => 'algoriza.currency.currencies',
            ]);
        });
    });
});

Route::group(['namespace' => 'Botble\Currency\Http\Controllers'], function () {
    AdminHelper::registerRoutes(function () {
        Route::group(['prefix' => 'currencies'], function () {
            Route::get('search', [
                'as' => 'currency.search',
                'uses' => 'CurrencyController@search'
            ]);

            Route::put('update/default', [
                'as' => 'currency.update.default',
                'uses' => 'CurrencyController@updateDefault'
            ]);
        });
    });
});