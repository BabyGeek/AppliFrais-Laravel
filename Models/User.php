<?php

namespace Models;

use Carbon\Carbon;
use Modules\Costs\Models\CostPackage;
use Illuminate\Notifications\Notifiable;
use Modules\Costs\Models\CostNonPackage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'login',
        'password',
        'address',
        'CP',
        'city',
        'hiring_date',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getHiringDateAttribute()
    {
        $this->hiring_date->format('Y-m-d');
    }

    public function packages()
    {
        return $this->hasMany(CostPackage::class, 'user_id');
    }

    public function nonpackages()
    {
        return $this->hasMany(CostNonPackage::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

}
