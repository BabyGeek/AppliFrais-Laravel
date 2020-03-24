<?php

namespace Modules\Justificates\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Justificate extends Model
{
    use SoftDeletes;

    protected $table = 'justificates';

    protected $fillable = [
        'name',
        'path',
        'mime_type',
    ];


    /**
     * Table relation Morph
     */
    public function justificable()
    {
        return $this->morphTo();
    }

    /**
     * Scope a query to only include justificates of a pdf mime type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePDF($query)
    {
        return $query->where('mime_type', 'application/pdf');
    }

    /**
     * Scope a query to only include justificates of a jpeg mime type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJPEG($query)
    {
        return $query->where('mime_type', 'images/jpeg');
    }

    /**
     * Scope a query to only include justificates of a png mime type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePNG($query)
    {
        return $query->where('mime_type', 'images/png');
    }
}
