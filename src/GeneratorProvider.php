<?php namespace EduardoR2K\VueInternationalizationGenerator;

use Illuminate\Support\ServiceProvider;

class GeneratorProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app[ 'vue-i18n.generate' ] = $this->app->singleton(function () {
            return new Commands\GenerateInclude;
        });

        $this->commands(
            'vue-i18n.generate'
        );

        $this->publishes([
            __DIR__.'/config/vue-i18n-generator.php' => config_path('vue-i18n-generator.php'),
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['vue-i18n-generator'];
    }
}
