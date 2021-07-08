<?php
namespace App\Http\Middleware;

use Closure;

use Carbon\Carbon;

use App;

use Config;

use Illuminate\Support\Facades\Session;

class Localization

{

public function __construct(App $app) {

    $this->app = $app;

}

/**

* Handle an incoming request.

*

* @param  \Illuminate\Http\Request  $request

* @param  \Closure $next

* @return mixed

*/

public function handle($request, Closure $next)

{

    if(Session::has('locale')){

        $current_locale= Session::get('locale');//get saved session locale value

        App::setLocale($current_locale); // set app localization with locale value session

        Carbon::setLocale($current_locale); //set carbon localization for date/time system with locale value session

    }

    else{

        $app_locale = session('locale', config('app.locale')); // set session locale with app localization setting & return the locale value

        Carbon::setLocale($app_locale);//set carbon localization with current app localization configuration

    }

    return $next($request);

}
}
