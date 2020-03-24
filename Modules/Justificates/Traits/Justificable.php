<?php

namespace Modules\justificates\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Justificates\Models\Justificate;

trait Justificable
{
    /**
     * Define a polymorphic one-to-many relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $type
     * @param string $id
     * @param string $localKey
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    //abstract public function morphMany($related, $name, $type = null, $id = null, $localKey = null);

    /**
     * Get all attached Justificates to the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function justificates(): MorphMany
    {
        return $this->morphMany(Justificate::class, 'justificable');
    }

    /**
     * Get the billing justificate.
     *
     * @return Justificate
     */
    public function justificateMimeTypePDF()
    {
        return $this->justificates()->pdf();
    }

    /**
     * Get the billing justificate.
     *
     * @return Justificate
     */
    public function justificateMimeTypeJPEG()
    {
        return $this->justificates()->jpeg();
    }

    /**
     * Get the billing justificate.
     *
     * @return Justificate
     */
    public function justificateMimeTypePNG()
    {
        return $this->justificates()->png();
    }

}
