<?php

namespace Modules\Costs\Enum;

use Konekt\Enum\Enum;

class CostType extends Enum
{

    const __default = self::ETAPE;

    const ETAPE = 'etape';
    const KILOMETRIC = 'kilometric';
    const NIGHT = 'night';
    const MEAL = 'meal';


    public static $labels = [];

    protected static function boot()
    {
        static::$labels = [

            self::ETAPE => trans('Forfait Etape'),
            self::KILOMETRIC => trans('Frais Kilométrique'),
            self::NIGHT => trans('Nuitée Hôtel'),
            self::MEAL => trans('Repas Restaurant'),
        ];
    }

}
