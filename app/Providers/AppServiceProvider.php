<?php

namespace App\Providers;


use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME,"tr_TR");
        Carbon::setLocale("tr");

        Schema::defaultStringLength(191);

        config()->set("ayarlar",\App\Ayar::pluck("value","name")->all());

        $this->app['form']->component('bsText', 'form_companents/text', ['name', 'label_name', 'value' => null, 'attributes'=> []]);
        $this->app['form']->component('bsTextarea', 'form_companents/textarea', ['name', 'label_name', 'value' => null, 'attributes'=> []]);
        $this->app['form']->component('bsPassword', 'form_companents/password', ['name', 'label_name', 'attributes'=> []]);
        $this->app['form']->component('bsSubmit', 'form_companents/submit', ['name', 'url'=> URL::previous()]);
        $this->app['form']->component('bsFile', 'form_companents/file', ['name', 'label_name']);
        $this->app['form']->component('bsSelect', 'form_companents/select', ['name', 'label_name','value','liste'=>[],'placeholder']);
        $this->app["form"]->component('bsCheckbox', 'form_companents/checkbox', ['name', 'label_name', 'elemanlar' => [] ]);
        $this->app['form']->component('bsCheckbox2', 'form_companents/checkbox2', ['name', 'label_name', 'makale'=>[]]);


        /*Route::bind('user', function ( $value ){
            return \App\User::where('id', $value)->firstOrFail();
        });*/
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
