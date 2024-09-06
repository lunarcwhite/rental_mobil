<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = ['profileRentalId', 'namaMobil', 'harga', 'jumlahKursi', 'bahanBakar', 'gigi', 'platMobil', 'gambar', 'deskripsi'];
    
    /**
     * Get the profileRental that owns the Mobil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profileRental(): BelongsTo
    {
        return $this->belongsTo(ProfileRental::class, 'profileRentalId');
    }

    public function persetujuanMobil(): HasMany
    {
        return $this->hasMany(PersetujuanMobil::class, 'mobilId');
    }
}
