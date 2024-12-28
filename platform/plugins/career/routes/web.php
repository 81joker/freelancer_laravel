<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Career\Models\Career;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\Career\Http\Controllers', 'middleware' => ['web', 'core']], function (): void {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function (): void {
        Route::group(['prefix' => 'careers', 'as' => 'career.'], function (): void {
            Route::resource('', 'CareerController')->parameters(['' => 'career']);
        });
    });

    if (defined('THEME_MODULE_SCREEN_NAME')) {
        Theme::registerRoutes(function (): void {
            Route::get(SlugHelper::getPrefix(Career::class, 'careers') ?: 'careers', 'PublicController@careers')
                ->name('public.careers');
        });
    }
});
