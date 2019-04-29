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
        'name', 'email', 'password', 'member_ship_code', 'mobile', 'referral_code', 'social_login', 'login_type', 'birth_date', 'anniversary_date'
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
     * @return string
     * Referral Function
     */
    public static function referralCode()
    {
        $random = 'SHRD'.str_random(4);
        if (self::where('referral_code', $random)->first()) {
            $random = 'SHRD'.str_random(4);
        }

        return $random;
    }
    /**
     * [memberShipCode description]
     * @return [type] [description]
     */
    public static function memberShipCode($name, $birthDate)
    {
        $random = 'SHRD'.substr($name, 0, 4).str_random(1).date('y', strtotime($birthDate));
        if (self::where('member_ship_code', $random)->first()) {
            $random = 'SHRD'.substr($name, 0, 4).str_random(1).date('y', strtotime($birthDate));
        }

        return $random;
    }

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

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
