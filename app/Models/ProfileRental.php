<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfileRental extends Model
{
    use HasFactory;

    protected $fillable = ['namaRental', 'alamatRental','kecamatanRental', 'desaRental', 'rwRental', 'rtRental', 'noHpRental', 'userId'];

    /**
     * Get all of the mobil for the ProfileRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mobil(): HasMany
    {
        return $this->hasMany(Mobil::class, 'profileRentalId');
    }

}
