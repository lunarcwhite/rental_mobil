<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roleId',
        'accountVerified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleId');
    }

    /**
     * Get the profileUser associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'userId');
    }

        /**
     * Get the user associated with the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profileRental(): HasOne
    {
        return $this->hasOne(ProfileRental::class, 'userId', 'id');
    }

    /**
     * Get all of the persetujuanAkun for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function persetujuanAkun(): HasMany
    {
        return $this->hasMany(PersetujuanAkun::class, 'userId');
    }

    public function roleName()
    {
        //fungsi ini berfungsi untuk mengecek nama role
        //fungsi ini dibuat untuk mempermudah pembuatan Guard yang dinamis
        if(Auth::check()){
            return Auth::user()->role->namaRole;
        }
    }
}
