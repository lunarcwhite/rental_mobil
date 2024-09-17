<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GPS;
use App\Models\Mobil;

class GpsController extends Controller
{
    public function index()
    {
        try {
            $data['mobils'] = Mobil::where('statusPersetujuan', 1)->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('SuperAdmin.gps.index')->with($data);
    }

    public function create($id)
    {
        try {
            $data['mobil'] = Mobil::where('id', $id)->first();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('SuperAdmin.gps.create')->with($data);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'key' => 'required',
            'imei' => 'required'
        ]);
        
        try {
            $data = $request->input();
            $data['mobilId'] = $id;
            GPS::create($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->route('superAdmin.gps.index')->with('success', 'Aksi berhasil!');
    }

    public function edit($id)
    {
        try {
            $data['mobil'] = Mobil::where('id', $id)->first();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('SuperAdmin.gps.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required',
            'imei' => 'required'
        ]);

        try {
            $data['mobilId'] = $id;
            GPS::where('mobilId', $id)->update([
                'imei' => $request->imei,
                'key' => $request->key
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->route('superAdmin.gps.index')->with('success', 'Aksi berhasil!');
    }
}
