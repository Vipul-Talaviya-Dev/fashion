<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppContent extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'support_email', 'support_mobile', 'address', 'fb_link', 'instagram_link', 'twitter_link', 'google_link', 'delivery_charge', 'offer_text',
    ];

    protected $dates = [
        'deleted_at'
    ];
}
