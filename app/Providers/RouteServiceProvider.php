<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->namespace($this->namespace)
                ->group(function ($router) {
                    $this->getRoutes(base_path('routes/api-public/'));
                });

            Route::prefix('api')
                ->middleware('auth:sanctum')
                ->namespace($this->namespace)
                ->group(function ($router) {
                    $this->getRoutes(base_path('routes/api-privates/'));
                });
        });
    }

    
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }


    /**
     * Load routes from a directory.
     *
     * @param string $directory
     * @return void
     */

     public function getRoutes($directory)
     {
         # Abre el directorio
         if ($handle = opendir($directory)) {
             #Recorre todos los elementos del directorio
             while (($file = readdir($handle)) !== false) {
                 
                #Ignora los directorios '.' y '..'
                 if ($file == '.' || $file == '..') continue;
     
                 #Construye la ruta completa al archivo o directorio
                 $path = $directory . $file;
     
                 #Si es un archivo, requiérelo
                 if (is_file($path)) {
                     require $path;
                 }
                 #Si es un directorio, llama a la función de manera recursiva
                 elseif (is_dir($path)) {
                     $this->getRoutes($path . '/');
                 }
             }
     
             #Cierra el directorio
             closedir($handle);
         }
     }

}
