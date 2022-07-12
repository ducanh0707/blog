<?php


namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
{
    // ...
    private $locales = [ 'en','vi','jp'];

    // ...
    public function handle($request, Closure $next, $locale)
    {
        if (array_search($locale, $this->locales) === false) {
            return redirect('/');
        }

        App::setLocale($locale);

        return $next($request);
    }
}