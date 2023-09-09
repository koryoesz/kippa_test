<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'id', 'referred_by', 'enrolled_date', 'username',
    ];

    public function referrer()
    {
        return $this->belongsTo(SELF::class, 'referred_by', 'id');
    }

    public function allReferrer()
    {
        return $this->hasMany(SELF::class, 'referred_by', 'id');
    }
}
