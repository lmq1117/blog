<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 启动应用服务。
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //DB::listen(function ($query){
        //    $query->sql;
        //    $query->time;
        //});
    }

    /**
     * 注册服务提供者。
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
