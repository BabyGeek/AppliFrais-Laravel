<?php

namespace Modules\Costs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostPackage extends Model
{
    use SoftDeletes;

    protected $table = 'cost_packages';

    protected $fillable = [
        'justificatory',
        'justificatory_number',
        'value',
        'date',
        'state',
    ];

    protected $dates = [
        'date',
    ];

    public function getDateAttribute()
    {
        $this->date->format('Y-m-d');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d', $request->input('date'));
    }
}
