<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ACTIVE = 1, INACTIVE = 2;
    use Eloquence;
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'member_ship_code', 'mobile', 'referral_code'
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
        'created_at',
        'updated_at',
        'deleted_at'
    ];
     /**
     * scope
     */

    public function scopeActive($query)
    {
        return $query->where('users.status', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('users.status', self::INACTIVE);
    }
}
