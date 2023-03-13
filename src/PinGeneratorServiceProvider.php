<?php
    
    namespace Jmcnelis\PinGenerator;
    
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\Route;
    
    class PinGeneratorServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->bind('calculator', function($app) {
                return new Calculator();
            });
            $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'pingenerator');
        }

        public function boot()
        {
            if ($this->app->runningInConsole()) {

                // Export migration
                if (! class_exists('CreatePinsTable')) {
                    $this->publishes([
                        __DIR__ . '/../database/migrations/create_pins_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_pins_table.php'),
                    ], 'migrations');

                }

                $this->publishes([
                    __DIR__.'/../config/config.php' => config_path('pingenerator.php'),
                ], 'config');

                $this->publishes([
                    __DIR__.'/../resources/views' => resource_path('views/vendor/pingenerator'),
                ], 'views');

            }

            $this->registerRoutes();

            $this->loadViewsFrom(__DIR__.'/../resources/views', 'pingenerator');
        }
    
        protected function registerRoutes()
        {
            Route::group($this->routeConfiguration(), function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            });
        }
    
        protected function routeConfiguration()
        {
            return [
                'prefix' => config('pingenerator.prefix'),
                'middleware' => config('pingenerator.middleware'),
            ];
        }
    }
