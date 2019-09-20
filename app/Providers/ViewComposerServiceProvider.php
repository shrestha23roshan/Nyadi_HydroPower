<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * 
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'layouts.backend.sidebar'
            ],
            'App\Http\ViewComposers\Backend\SidebarComposer'
        );

        view()->composer(
            [
                'layouts.backend.breadcrumb'
            ],
            'App\Http\ViewComposers\Backend\BreadcrumbComposer'
        );

        view()->composer(
            [
                'layouts.frontend.partial.header'
            ],
            'App\Http\ViewComposers\HeaderComposer'
        );

        view()->composer(
            [
                'layouts.frontend.partial.footer'
            ],
            'App\Http\ViewComposers\FooterComposer'
        );
        view()->composer(
            [
                'layouts.frontend.partial.head'
            ],
            'App\Http\ViewComposers\HeadComposer'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}