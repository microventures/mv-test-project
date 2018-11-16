<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    /**
     * An investment belongs to an Investor
     *
     * @return BelongsTo
     */
    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
