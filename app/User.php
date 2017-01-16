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

}
