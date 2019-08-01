<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use App\Http\Validators\GoodValidator;

class GoodServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
	    $validator = $this->app['validator'];
	    $validator->resolver(function($translator, $data, $rules, $messages) {
		    return new GoodValidator($translator, $data, $rules, $messages);
	    });
    }
}
