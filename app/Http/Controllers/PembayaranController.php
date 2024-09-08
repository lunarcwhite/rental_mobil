<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pembayaran;
use App\Models\Mobil;

class PembayaranController extends Controller
{

    public function store(Request $request, $id)
    {
        $request->validate([
            'tanggalMulai' => 'required',
            'tanggalKembali' => 'required',
        ]);
        $tanggalMulai = date_create($request->tanggalMulai);
        $tanggalKembali = date_create($request->tanggalKembali);

        $interval = date_diff($tanggalMulai, $tanggalKembali);

        $selisih = $interval->days;
        
        $mobil = Mobil::where('id', $id)->first();
        $harusBayar = ($mobil->harga + ($mobil->harga * 10 / 100)) * $selisih;
        try {
            $data = $request->input();
            $data['mobilId'] = $id;
            $data['userId'] = Auth::user()->id;
            $data['harusBayar'] = $harusBayar;
            $data['durasiRental'] = $selisih;
            $data['kodePembayaran'] = rand(00000000, 99999999);
            Pembayaran::create($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi Gagal')->withInput();
        }
        return redirect()->route('pembayaran.invoice')->with('success', 'Aksi Berhasil')->withInput();
    }

    public function invoice()
    {
        try {
            $data['pembayaran'] = Pembayaran::where('statusPembayaran', 0 )->where('userId', Auth::user()->id)->latest('id')->first();
        } catch (\Throwable $th) {
            return view('errors.500');
        }

        return view('Pembayaran.invoice')->with($data);
    }
}
