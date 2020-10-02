<?php

namespace App\Providers;

use Iugu;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Fix MySQL Encoding
        Schema::defaultStringLength(191);

        // Set IUGU Key
        Iugu::setApiKey(config('app.iugu_token'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->bootObservers();
        $this->bootBladeDirectives();
    }

    /**
     * Bootstrap blade directives.
     * 
     * @return void
     */
    protected function bootBladeDirectives()
    {
        // Elements
        Blade::include('shared.components.elements.input', 'input');
        Blade::include('shared.components.elements.file', 'file');
        Blade::include('shared.components.elements.select', 'select');
        Blade::include('shared.components.elements.switch', 'switch');
        Blade::include('shared.components.elements.textarea', 'textarea');
        Blade::include('shared.components.elements.checkbox', 'checkbox');

        // Buttons
        Blade::include('shared.components.elements.buttons.table-button', 'table_btn');
        Blade::include('shared.components.elements.buttons.action-button', 'action_btn');

        // Icons
        Blade::include('shared.components.elements.icon', 'icon');

        // Layouts
        Blade::component('shared.components.layouts.content', 'content');
        Blade::component('shared.components.layouts.form', 'form');
        Blade::component('shared.components.layouts.btn-group', 'btn_group');

        // Blocks
        Blade::component('shared.components.blocks.default', 'block');
        Blade::component('shared.components.blocks.form', 'block_form');

        // Heroes
        Blade::include('shared.components.heroes.default', 'hero');
        Blade::include('shared.components.heroes.image', 'hero_image');

        // Badges
        Blade::include('shared.components.elements.badge', 'badge');

        // Alerts
        Blade::include('shared.components.alerts.status', 'status');

        // Tables
        Blade::component('shared.components.tables.simple', 'table');

        // Directives
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });
    }

    /**
     * Bootstrap observers.
     * 
     * @return void
     */
    protected function bootObservers()
    {
        // User Observer
        /*
        \App\Models\Account\UserModel::observe(
            \App\Observers\Account\UserObserver::class
        );
        */
        // Subscription Observer
        /*
        \App\Models\Merchant\SubscriptionModel::observe(
            \App\Observers\Merchant\SubscriptionObserver::class
        );
        */
        // Invoice Observer
        /*
        \App\Models\Merchant\InvoiceModel::observe(
            \App\Observers\Merchant\InvoiceObserver::class
        );
        */
    }
}
