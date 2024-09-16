<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\ProfileRental;
use App\Models\User;
use Storage;
use Illuminate\Validation\Rule;
use App\Models\PersetujuanAkun;
use App\Models\Rental;
use App\Models\Pembayaran;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        try {
            if (Auth::check() && Auth::user()->roleId == 2) {
                $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
                $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                    ->whereNotExists($rental)
                    ->whereNot('statusPembayaran', 2)
                    ->count();
            }
            $user = Auth::user();
            $data['profile'] = Profile::where('userId', $user->id)->first();
            $data['user'] = User::where('id', $user->id)->first();
            $data['profileRental'] = ProfileRental::where('userId', $user->id)->first();
            $data['penolakans'] = PersetujuanAkun::where('userId', $user->id)->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('profile.index')->with($data);
    }

    public function create()
    {
        try {
            $user = Auth::user();
            $data['pengguna'] = $user;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return view('errors.500');
        }
        return view('profile.create')->with($data);
    }

    /**
     * store the user's profile information.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        // dd($filename);
        if ($user->roleId == 3) {
            $request->validate([
                'profile.nik' => 'required|digits:16',
                'profile.namaLengkap' => 'required',
                'profile.tanggalLahir' => 'required',
                'profile.alamatTempatTinggal' => 'required',
                'profile.kecamatan' => 'required',
                'profile.desa' => 'required',
                'profile.rt' => 'required',
                'profile.rw' => 'required',
                'profile.noHp' => 'required',
                'profile.kyc' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        } else {
            $request->validate([
                'profile.nik' => 'required|digits:16',
                'profile.namaLengkap' => 'required',
                'profile.tanggalLahir' => 'required',
                'profile.alamatTempatTinggal' => 'required',
                'profile.kecamatan' => 'required',
                'profile.desa' => 'required',
                'profile.rt' => 'required',
                'profile.rw' => 'required',
                'profile.noHp' => 'required',
                'profile.kyc' => 'required|image|mimes:jpeg,png,jpg',
                'profileRental.namaRental' => 'required',
                'profileRental.kecamatanRental' => 'required',
                'profileRental.desaRental' => 'required',
                'profileRental.rtRental' => 'required',
                'profileRental.rwRental' => 'required',
                'profileRental.noHpRental' => 'required',
            ]);
        }

        try {
            $profile = $request->profile;
            $foto = $profile['kyc'];

            $extension = $foto->extension();
            $filename = 'kyc_' . '' . $user->id . '.' . $extension;
            $foto->storeAs('public/kyc/', $filename);
            $profile['kyc'] = $filename;

            $profile['userId'] = $user->id;

            Profile::create($profile);

            if ($user->roleId == 2) {
                $profileRental = $request->profileRental;
                $profileRental['userId'] = $user->id;
                ProfileRental::create($profileRental);
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->route('dashboard')->with('success', 'Aksi berhasil');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        // dd($request->profile);
        if ($user->roleId == 3) {
            $request->validate([
                'profile.nik' => 'required|digits:16',
                'profile.namaLengkap' => 'required',
                'profile.tanggalLahir' => 'required',
                'profile.alamatTempatTinggal' => 'required',
                'profile.kecamatan' => 'required',
                'profile.desa' => 'required',
                'profile.rt' => 'required',
                'profile.rw' => 'required',
                'profile.noHp' => 'required',
                'profile.kyc' => 'image|mimes:jpeg,png,jpg',
            ]);
        } else {
            $request->validate([
                'profile.nik' => 'required|digits:16',
                'profile.namaLengkap' => 'required',
                'profile.tanggalLahir' => 'required',
                'profile.alamatTempatTinggal' => 'required',
                'profile.kecamatan' => 'required',
                'profile.desa' => 'required',
                'profile.rt' => 'required',
                'profile.rw' => 'required',
                'profile.noHp' => 'required',
                'profile.kyc' => 'image|mimes:jpeg,png,jpg',
                'profileRental.namaRental' => 'required',
                'profileRental.kecamatanRental' => 'required',
                'profileRental.desaRental' => 'required',
                'profileRental.rtRental' => 'required',
                'profileRental.rwRental' => 'required',
                'profileRental.noHpRental' => 'required',
            ]);
        }

        try {
            $profile = $request->profile;
            // dd($profile);
            if (array_key_exists('kyc', $profile)) {
                $foto = $profile['kyc'];
                Storage::delete('public/kyc/' . $user->profile->kyc);
                $extension = $foto->extension();
                $filename = 'kyc_' . '' . $user->id . '.' . $extension;
                $foto->storeAs('public/kyc/', $filename);
                $profile['kyc'] = $filename;
            }
            $profile['userId'] = $user->id;

            Profile::where('userId', $user->id)->update($profile);

            if ($user->roleId == 2) {
                $profileRental = $request->profileRental;
                $profileRental['userId'] = $user->id;
                ProfileRental::where('userId', $user->id)->update($profileRental);
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->route('dashboard')->with('success', 'Aksi berhasil');
    }

    public function akunUpdate(Request $request)
    {
        $user = Auth::user();

        // dd($request->all());

        $request->validate([
            'current_password' => ['current_password'],
            'password' => ['min:8'],
            'name' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', Rule::unique('users')->ignore($user->id), 'email'],
        ]);

        try {
            $updateUser = $request->except('_method', '_token', 'current_password');
            if ($request->password != null) {
                $updateUser['password'] = bcrypt($request->password);
                // dd($updateUser);
            } else {
                unset($updateUser['password']);
            }
            User::where('id', $user->id)->update($updateUser);
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        try {
            $user = $request->user();

            Storage::delete('public/kyc/' . $user->profile->kyc);

            Auth::logout();

            $user->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Akun gagal dihapus')->withInput();
        }

        return redirect('/')->with('success', 'Akun berhasil dihapus');
    }
}
