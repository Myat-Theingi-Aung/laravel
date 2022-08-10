<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Task\TaskDaoInterface', 'App\Dao\Task\TaskDao');
        $this->app->bind('App\Contracts\Dao\Singer\SingerDaoInterface','App\Dao\Singer\SingerDao');
        $this->app->bind('App\Contracts\Dao\Song\SongDaoInterface','App\Dao\Song\SongDao');
        $this->app->bind('App\Contracts\Dao\Join\JoinDaoInterface','App\Dao\Join\JoinDao');

        // Business Logic Registration
        $this->app->bind('App\Contracts\Services\Task\TaskServiceInterface', 'App\Services\Task\TaskService');
        $this->app->bind('App\Contracts\Services\Singer\SingerServiceInterface','App\Services\Singer\SingerService');
        $this->app->bind('App\Contracts\Services\Song\SongServiceInterface','App\Services\Song\SongService');
        $this->app->bind('App\Contracts\Services\Join\JoinServiceInterface','App\Services\Join\JoinService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
