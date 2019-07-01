<?php

namespace Modules\Costs\Models;

use Models\User;
use Carbon\Carbon;
use Modules\Costs\Models\Costs\Cost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostPackage extends Model
{
    use SoftDeletes;

    protected $table = 'cost_packages';

    protected $fillable = [
        'user_id',
        'cost_id',
        'value',
        'date',
        'state',
    ];

    protected $dates = [
        'date',
    ];

    public function getDateAttribute()
    {
        $this->date->format('d-m-Y');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::today();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cost()
    {
        return $this->belongsTo(Cost::class, 'cost_id');
    }
}
