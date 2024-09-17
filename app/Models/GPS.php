<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GPS extends Model
{
    use HasFactory;

    protected $fillable = ['mobilId', 'imei', 'key', 'profileRentalId'];

    /**
     * Get the mobil that owns the GPS
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'mobilId');
    }
}
