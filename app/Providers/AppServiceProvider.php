<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelComposer;
use Illuminate\Support\Facades\View;
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
        $this->app->singleton(PaymentGatewayContract::class, function($app) {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Option 1 - Every Single View 
        // View::share('channels',\App\Channel::orderBy('name')->get());

        //Option 2 - Granular Views with wildcards
        // View::composer(['post.create','channel.index'], function($view) {
        //     $view->with('channels', \App\Channel::orderBy('name')->get());
        // });

        View::composer(['post.create', 'channel.index'], ChannelComposer::class);

    }
}
