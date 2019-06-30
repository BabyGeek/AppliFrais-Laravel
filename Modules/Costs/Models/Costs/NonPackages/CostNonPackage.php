<?php

namespace Modules\Costs\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostNonPackage extends Model
{
    use Sluggable, SoftDeletes;

    protected $table = 'cost_non_packages';

    protected $fillable = [
        'justificatory',
        'justificatory_number',
        'value',
        'label',
        'state',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'label'
            ]
        ];
    }
}
