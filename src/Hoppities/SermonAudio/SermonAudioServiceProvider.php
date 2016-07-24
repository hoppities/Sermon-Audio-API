<?php

namespace Hoppities\SermonAudio;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class SermonAudioServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SermonAudio', function () {
            return new SermonAudio(config('sermonaudio.apiKey'));
        });
        $this->mergeConfigFrom(__DIR__ . '/config/sermonaudio.php', 'sermonaudio');
    }

    /**
     * Publish the plugin configuration.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/sermonaudio.php' => config_path('sermonaudio.php'),
        ], 'config');

        // Load the facade
        AliasLoader::getInstance()->alias('SermonAudio', 'Hoppities\SermonAudio\SermonAudioFacade');
    }

    /**
     * Get the active router.
     *
     * @return Router
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }
}
