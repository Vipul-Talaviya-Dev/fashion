<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use Notifiable;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = [
        'name',
        'offer_code',
        'discount',
        'start_date',
        'end_date',
        'status'
    ];

    /**
     * scope
     */

    public function scopeActive($query)
    {
        return $query->whereStatus(self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->whereStatus(self::INACTIVE);
    }
}
