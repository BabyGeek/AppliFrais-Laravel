<?php

namespace Modules\Costs\Models;

use Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostNonPackage extends Model
{
    use Sluggable, SoftDeletes;

    protected $table = 'cost_non_packages';

    protected $fillable = [
        'justificate_path',
        'justificate_name',
        'value',
        'label',
        'date',
        'state',
    ];

    protected $dates = [
        'date',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'label'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateAttribute()
    {
        $this->date->format('d-m-Y');
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d', $request->input('date'));
    }
}
