<?php  namespace Phonebook\Providers; 

use Phonebook\Phonebook;
use Phonebook\Resolvers\EloquentTenantResolver;

class PhonebookServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Phonebook\Resolvers\TenantResolver', function($app)
        {
            return new EloquentTenantResolver($app['config'], $app, $app['request']);
        });

        $this->app->bind('Phonebook\Phonebook', function($app)
        {
            return new Phonebook($app['Phonebook\Resolvers\TenantResolver']);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Config/laravel.php' => config_path('phonebook.php')
        ]);
    }
}