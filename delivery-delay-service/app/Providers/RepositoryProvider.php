<?php

namespace App\Providers;

use App\Repositories\Vendor\VendorImp;
use App\Repositories\Vendor\VendorInt;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VendorInt::class, VendorImp::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
