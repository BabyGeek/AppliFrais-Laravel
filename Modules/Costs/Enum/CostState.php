<?php

namespace Modules\Costs\Enum;

use Konekt\Enum\Enum;

class CostState extends Enum
{

    const __default = self::CREATED;

    const CREATED = 'created';
    const CLOSED = 'closed';
    const REFUND = 'refund';
    const VALIDATE = 'validate';


    public static $labels = [];

    protected static function boot()
    {
        static::$labels = [

            self::CREATED => trans('Fiche créée, saisie en cours'),
            self::CLOSED => trans('Saisie clôturée'),
            self::REFUND => trans('Remboursée'),
            self::VALIDATE => trans('Validée et mise en paiement'),
        ];
    }

}
