<?php

namespace Modules\Costs\Models;

use Models\User;
use Carbon\Carbon;
use Modules\Costs\Enum\CostType;
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
        'month',
    ];

    protected $dates = [
        'date',
    ];

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

    public function getValueForPackage($package)
    {
        if(CostType::create($package->cost->type) == CostType::KILOMETRIC())
        {
            $car_cv = $package->user->car->cv;
            if($car_cv == 3)
            {
                $price = 0.451 * $package->value;
            }elseif($car_cv == 4)
            {
                $price = 0.518 * $package->value;
            }elseif($car_cv == 5)
            {
                $price = 0.543 * $package->value;
            }elseif($car_cv == 6)
            {   
                $price = 0.563 * $package->value;
            }elseif($car_cv >= 7)
            {
                $price = 0.595 * $package->value;                
            }

            return $price;
        }elseif(CostType::create($package->cost->type) == CostType::NIGHT())
        {
            return 80 * $package->value;

        }elseif(CostType::create($package->cost->type) == CostType::MEAL())
        {
            return 25 * $package->value;
        }elseif(CostType::create($package->cost->type) == CostType::ETAPE())
        {
            return 110 * $package->value;
        }
    }
}
