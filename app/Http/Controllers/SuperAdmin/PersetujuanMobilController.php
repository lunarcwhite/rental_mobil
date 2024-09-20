<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\PersetujuanMobil;

class PersetujuanMobilController extends Controller
{
    public function index()
    {
        try {
            $data['mobils'] = Mobil::where('statusPersetujuan', 0)->get();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('SuperAdmin.persetujuanMobil.index')->with($data);
    }

    public function mobil($id)
    {
        try {
            $data['mobil'] = Mobil::where('id', $id)->first();
            $data['penolakans'] = PersetujuanMobil::where('mobilId', $id)->get();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return view('errors.500');
        }
        return view('SuperAdmin.persetujuanMobil.mobil')->with($data);
    }

    public function setujui($id)
    {
        try {
            $penolakan = PersetujuanMobil::where('mobilId', $id)->delete();
            Mobil::where('id', $id)->update([
                'statusPersetujuan' => 1
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }

        return redirect()->route('superAdmin.persetujuanMobil.index')->with('success', 'Aksi berhasil!');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasanPenolakan' => 'required'
        ]);
        try {
            PersetujuanMobil::create([
                'alasanPenolakan' => $request->alasanPenolakan,
                'mobilId' => $id
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }

        return redirect()->route('superAdmin.persetujuanMobil.index')->with('success', 'Aksi berhasil!');
    }
}
