<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Rental;
use App\Models\Mobil;
use App\Models\Keuangan;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        try {
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['pembayarans'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->whereNot('statusPembayaran', 2)
                ->get();
            $data['transaksiBerjalan'] = $data['pembayarans']->count();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('AdminRental.transaksi.index')->with($data);
    }

    public function mulai($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $data = [
            'userId' => $pembayaran->userId,
            'profileRentalId' => $pembayaran->profileRentalId,
            'mobilId' => $pembayaran->mobilId,
            'pembayaranId' => $id,
        ];

        try {
            Mobil::where('id', $pembayaran->mobilId)->update([
                'statusAktif' => 0,
            ]);
            Rental::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!');
    }

    public function finish($id)
    {
        try {
            $pembayaran = Pembayaran::where('id', $id)->first();
            $keuangan = Keuangan::where('userId', $pembayaran->profileRental->userId)->first(); 
            Rental::where('pembayaranId', $id)->update([
                'statusSelesai' => 1,
                'statusBerjalan' => 0,
            ]);

            Mobil::where('id', $pembayaran->mobilId)->update([
                'statusAktif' => 1,
            ]);

            if ($keuangan == null) {
                Keuangan::create([
                    'userId' => $pembayaran->profileRental->userId,
                    'saldoTersimpan' => $pembayaran->pendapatanRental
                ]);
            }else{
                Keuangan::where('userId', $pembayaran->profileRental->userId)->update([
                    'saldoTersimpan' => $keuangan->saldoTersimpan + $pembayaran->pendapatanRental
                ]);
            }

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!');
    }

    public function batalkan($id)
    {
        try {
            Pembayaran::where('id', $id)->update([
                'statusPembayaran' => 2
            ]);
            $pembayaran = Pembayaran::where('id', $id)->first();
            $keuangan = Keuangan::where('userId', $pembayaran->userId)->first(); 

            if ($keuangan == null) {
                Keuangan::create([
                    'userId' => $pembayaran->userId,
                    'saldoTersimpan' => $pembayaran->totalBayar
                ]);
            }else{
                Keuangan::where('userId', $pembayaran->userId)->update([
                    'saldoTersimpan' => $keuangan->saldoTersimpan + $pembayaran->totalBayar
                ]);
            }

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!');
    }
}
