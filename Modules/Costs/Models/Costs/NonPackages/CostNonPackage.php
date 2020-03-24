<?php

namespace Modules\Costs\Models;

use Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\justificates\Traits\Justificable;

class CostNonPackage extends Model
{
    use Sluggable, SoftDeletes, Justificable;

    protected $table = 'cost_non_packages';

    protected $fillable = [
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

}
