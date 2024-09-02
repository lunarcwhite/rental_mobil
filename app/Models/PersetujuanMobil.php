<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersetujuanMobil extends Model
{
    use HasFactory;

    protected $fillable = ['alasanPenolakan', 'profileRentalId'];

    /**
     * Get the profileRental that owns the PersetujuanMobil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'mobilId');
    }
}
