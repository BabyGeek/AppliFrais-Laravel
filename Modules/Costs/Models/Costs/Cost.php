<?php

namespace Modules\Costs\Models\Costs;

use Modules\Costs\Models\CostPackage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Cost extends Model
{
    use Sluggable;

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

    public function packages()
    {
        return $this->hasMany(CostPackage::class);
    }
}
