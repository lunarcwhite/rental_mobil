<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'mobilId', 'tanggalMulai', 'tanggalKembali', 'harusBayar',
     'totalBayar', 'kodePembayaran', 'durasiRental', 'profileRentalId', 'pendapatanRental', 'pendapatanAplikasi'];

    /**
     * Get the mobil that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'mobilId');
    }

    public function profileRental(): BelongsTo
    {
        return $this->belongsTo(ProfileRental::class, 'profileRentalId');
    }

    /**
     * Get the rental associated with the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rental(): HasOne
    {
        return $this->hasOne(Rental::class, 'pembayaranId');
    }

    /**
     * Get the user that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

}
