<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\PersetujuanAkun;
use App\Models\Profile;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //pembuatan guard yang dinamis memanfaatkan table roles

        if (Schema::hasTable('roles')) {
            // Jika database memiliki table roles maka fungsi ini akan mengambil semua roles yang ada pada table roles
            $roles = Role::all(); 
        } else {
            // Jika database tidak memiliki table roles maka akan dibuat roles sementara
            $roles = [
                [
                    'namaRole' => 'admin',
                ],
                [
                    'namaRole' => 'user'
                ]
            ]; 
        }

        foreach ($roles as $key => $value) {
            $namaRole = $value['namaRole'];
            Gate::define($namaRole, static function (User $user) use ($namaRole) {
                return $user->role->namaRole === $namaRole;
            });
        }

        Gate::define('accountVerified', function (User $user) {
            return $user->accountVerified == true;
        });
        Gate::define('accountNotVerified', function (User $user) {
            return $user->accountVerified == false;
        });
        //account pending = akun yang sudah melengkapi profile dan sedang menunggu persetujuan dari admin
        Gate::define('accountPending', function (User $user) {
            $ada = Profile::where('userId', $user->id)->first();
            return $ada != null;
        });

        Gate::define('createProfile', function (User $user) {
            $ada = Profile::where('userId', $user->id)->first();
            return $ada == null;
        });
        
    }
}