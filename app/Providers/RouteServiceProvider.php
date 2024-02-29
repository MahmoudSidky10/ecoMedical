<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $adminNamespace = 'App\Http\Controllers\Admin';
    protected $siteNamespace = 'App\Http\Controllers\Site';
    protected $ApiNamespace = 'App\Http\Controllers\Api';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapGuestApiRoutes();

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapSiteRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware(['web', 'lang','site'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapSiteRoutes()
    {
        Route::middleware(['web', 'lang', "auth",'site'])
            ->namespace($this->siteNamespace)
            ->group(base_path('routes/site-auth.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'admin', 'lang'])
            ->prefix('admin')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::middleware(['api', 'auth:api', 'lang'])
            ->prefix('api')
            ->namespace($this->ApiNamespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapGuestApiRoutes()
    {
        Route::prefix('api')
            ->middleware(["api", "lang"])
            ->namespace($this->ApiNamespace)
            ->group(base_path('routes/guest-api.php'));
    }
}
