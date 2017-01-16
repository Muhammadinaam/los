<?php

namespace App\Http\Middleware;

use Closure;

class ActiveUser
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

        

        //Check for admin users
        $user = \TCG\Voyager\Models\User::find(\Auth::id());

        if($user == null)
            return redirect('login');

        $is_admin_user = $user->hasPermission(
                config('voyager.user.admin_role', 'browse_admin')
            );

        if($is_admin_user)
        {

            if($user->activated == '1')
                return $next($request);
            else
                return redirect('inactive_account')->with('data', ['reason' => $user->not_activated_reason]);
        }
        else        
        //end check for admin users
        {

            if($request->user() == null)
            {
                return redirect('login');
            }
            else
            {
                if( $request->user()->parent_user()->subscribed('main') == false && 
                    $request->user()->parent_user()->onTrial() == false )
                {
                    if( $request->user()->company_owner == '1' )
                        return redirect('billing');
                    else
                        return view('inactive_account')->with('data', ['reason' => 'Subscription Expired']);
                }
            }
        }

        return $next($request);
    }
}
