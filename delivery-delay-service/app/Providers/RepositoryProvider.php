<?php

namespace App\Providers;

use App\Repositories\Agent\AgentImp;
use App\Repositories\Agent\AgentInt;
use App\Repositories\Order\OrderImp;
use App\Repositories\Order\OrderInt;
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

        $this->app->bind(OrderInt::class, OrderImp::class);

        $this->app->bind(AgentInt::class, AgentImp::class);
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
