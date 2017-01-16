<?php

namespace App\Http\Middleware;

use Closure;

class CompanyOwner
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
        if($request->user() == null)
        {
            return redirect('login');
        }
        else
        {
            if( $request->user()->company_owner != '1' )
            {
                return redirect('dashboard');    
            }
        }

        return $next($request);
    }
}
