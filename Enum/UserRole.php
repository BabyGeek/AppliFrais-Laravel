<?php

namespace Enum;
use Konekt\Enum\Enum;

class UserRole extends Enum
{
    const __DEFAULT      = self::VISITOR;

    const VISITOR         = 'visitor';
    const ADMINISTRATOR      = 'administrator';
    const ACCOUNTING     = 'accounting';

    public static $labels = [];

    protected static function boot()
    {
        static::$labels = [

            self::VISITOR => trans('visiteur médical'),
            self::ADMINISTRATOR => trans('administrateur'),
            self::ACCOUNTING => trans('comptable'),
        ];
    }
}
