<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_owner', 'company_name', 'country', 'city', 'telephone', 'mobile', 'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'trial_ends_at',
    ];

    public function parent_user()
    {
        $user = null;

        if($this->company_owner == '1')
        {
            $user = $this;
        }
        else
        {
            $user = $this->where('company_name', $this->company_name)
                        ->where('company_owner', '1')
                        ->first();
        }

        return $user;
    }





    public function isActive()
    {

        $active = array( 'success' => 'true', 'is_user_active' => 'true' );

        //Check for admin users
        $user = \TCG\Voyager\Models\User::find($this->id);

        if($user == null)
            return array( 'success' => 'false', 'is_user_active' => 'false', 'reason' => 'User does not exists' );

        $is_admin_user = $user->hasPermission(
                config('voyager.user.admin_role', 'browse_admin')
            );

        if($is_admin_user)
        {

            if($user->activated == '1')
                return $active;
            else
                return array( 'success' => 'false', 'is_user_active' => 'false', 'reason' => $user->not_activated_reason );
        }
        else        
        //end check for admin users
        {

            

            if($this->activated == '0')
                return array( 'success' => 'false', 'is_user_active' => 'false', 'reason' => $user->not_activated_reason );

            if( $this->parent_user()->subscribed('main') == false && 
                $this->parent_user()->onTrial() == false )
            {
                if( $this->company_owner == '1' )
                    return array( 'success' => 'false', 'is_user_active' => 'false', 'reason' => 'Subscription expired, Please go to Billing Section' );
                else
                    return array( 'success' => 'false', 'is_user_active' => 'false', 'reason' => 'Subscription expired' );
            }
            
        }


        return $active;
    }

}
