<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsCustomerMiddleware
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
        if(Auth::user()->isCustomer()){
            return redirect('/customer/list/vacancys');
        }
        return $next($request);
    }
}
