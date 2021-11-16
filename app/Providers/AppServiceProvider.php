<?php

namespace App\Providers;

use App\Item;
use App\User;
use App\Transaksi;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use App\Observers\TransaksiObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Item::observe(ItemObserver::class);
        User::observe(UserObserver::class);
        Transaksi::observe(TransaksiObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
