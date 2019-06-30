<?php

namespace Modules\Costs\Models\Costs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Cost extends Model
{
    use Sluggable, SoftDeletes;

    protected $table = 'costs';

    protected $fillable = [
        'label',
        'name',
        'value'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
