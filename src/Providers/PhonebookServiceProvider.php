<?php  namespace Phonebook\Providers; 

use Illuminate\Support\ServiceProvider;
use Phonebook\Middleware\Phonebook;
use Phonebook\Parsers\SubdomainParser;

use Phonebook\Resolvers\EloquentTenantResolver;

class PhonebookServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Phonebook\Parsers\Parser', function($app)
        {
            return new SubdomainParser();
        });

        $this->app->bind('Phonebook\Resolvers\TenantResolver', function($app)
        {
            return new EloquentTenantResolver($app['config'], $app, $app['request'], $app['Phonebook\Parsers\Parser']);
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