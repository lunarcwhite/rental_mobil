<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersetujuanAkun;
use App\Models\Profile;
use App\Models\ProfileRental;

class PersetujuanAkunController extends Controller
{
    public function index()
    {
        try {
            $data['users'] = User::whereNot('id', 1)->where('accountVerified', false)->get();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('SuperAdmin.persetujuanAkun.index')->with($data);
    }

    public function profile($id)
    {
        try {
            $data['profile'] = Profile::where('userId', $id)->first();
            $data['profileRental'] = ProfileRental::where('userId', $id)->first();
            $data['penolakans'] = PersetujuanAkun::where('userId', $id)->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('SuperAdmin.persetujuanAkun.profile')->with($data);
    }

    public function setujui($id)
    {
        try {
            $penolakan = PersetujuanAkun::where('userId', $id)->delete();
            User::where('id', $id)->update([
                'accountVerified' => 1
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }

        return redirect()->route('superAdmin.persetujuanAkun.index')->with('success', 'Aksi berhasil!');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasanPenolakan' => 'required'
        ]);
        try {
            PersetujuanAkun::create([
                'alasanPenolakan' => $request->alasanPenolakan,
                'userId' => $id
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }

        return redirect()->route('superAdmin.persetujuanAkun.index')->with('success', 'Aksi berhasil!');
    }
}
