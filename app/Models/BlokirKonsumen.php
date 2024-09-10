<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlokirKonsumen extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'profileRentalId'];

    /**
     * Get the user that owns the BlokirKonsumen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function profileRental(): BelongsTo
    {
        return $this->belongsTo(ProfileRental::class, 'profileRentalId');
    }
}
