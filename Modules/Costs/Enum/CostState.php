<?php

namespace Modules\Costs\Enum;

use Konekt\Enum\Enum;

class CostState extends Enum
{

    const __default = self::CREATED;

    const CREATED = 'created';
    const CLOSED = 'closed';
    const REFUND = 'refund';
    const REFUSED = 'refused';
    const VALIDATE = 'validate';
    const PAYEMENT = 'payement';


    public static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::CREATED => trans('Fiche créée'),
            self::CLOSED => trans('Fiche clôturée'),
            self::REFUND => trans('Fiche remboursée'),
            self::VALIDATE => trans('Fiche validée'),
            self::REFUSED => trans('Fiche invalidée'),
            self::PAYEMENT => trans('Mise en payement, payement effectué'),
        ];
    }

}
