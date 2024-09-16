<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingKonsumen extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'profileRentalId', 'bintang', 'ulasan'];

    /**
     * Get the user that owns the RatingMobil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Get the user that owns the RatingMobil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profileRental(): BelongsTo
    {
        return $this->belongsTo(ProfileRental::class, 'profileRentalId');
    }
}
