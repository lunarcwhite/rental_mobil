<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['profileRentalId', 'userId', 'mobilId', 'statusSelesai', 'pembayaranId'];

    /**
     * Get the mobil that owns the Rental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'mobilId');
    }

    /**
     * Get the pembayaran that owns the Rental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembayaran(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaranId');
    }

    /**
     * Get the user that owns the Rental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
