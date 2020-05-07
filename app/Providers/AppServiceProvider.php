<?php

namespace App\Providers;

use App\Friend;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('layouts.sidebar',function($view){
            $friends=Friend::where([
                ['user_id','=', auth()->user()->id],
                ['status','=','friends'],
            ])
            ->orwhere('to_user_id','=', auth()->user()->id)
            ->where('status','=','friends')
            ->get();
            $view->with('friends',$friends);
        });
    }
}
