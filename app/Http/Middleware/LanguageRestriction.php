<?php

namespace App\Http\Middleware;

use Closure;

class LanguageRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = request()->segment(1);
        $existingLang = ['en', 'lt', 'ru'];

        if (in_array($language, $existingLang)) {
            app()->setLocale($language);
            return $next($request);
        }
        return redirect(app()->getLocale());
    }
}
