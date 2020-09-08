<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // LINE BOT
        $this->app->bind('line-bot', function ($app, array $params) {
            return new LINEBot(
                new CurlHTTPClient(config('line.token')),
                ['channelSecret' => config('line.secret')]
            );
        });
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
