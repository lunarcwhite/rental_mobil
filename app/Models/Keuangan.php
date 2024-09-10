<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = ['profileRentalId', 'totalPendapatan', 'totalPenarikan'];

    /**
     * Get the profileRental that owns the Keuangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profileRental(): BelongsTo
    {
        return $this->belongsTo(ProfileRental::class, 'profileRentalId');
    }
}
