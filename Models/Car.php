<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Modules\justificates\Traits\Justificable;

class Car extends Model
{
    use Justificable;
    
    protected $table = 'cars';

    protected $fillable = [
        'model',
        'cv',
        'immatriculation',
    ];


}
