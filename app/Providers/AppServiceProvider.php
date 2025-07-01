<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\KursusSiswa;
use App\Observers\KursusSiswaObserver;
use App\Models\Transaksi;
use App\Observers\TransaksiObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        KursusSiswa::observe(KursusSiswaObserver::class);
        Transaksi::observe(TransaksiObserver::class);
    }
}
