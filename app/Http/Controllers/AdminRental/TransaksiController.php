<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Rental;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        try {
            $rental = Rental::where('statusSelesai', 1)
                ->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['pembayarans'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)->whereNotExists($rental)->get();
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
            Rental::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!');
    }

    public function finish($id)
    {
        try {
            Rental::where('pembayaranId', $id)->update([
                'statusSelesai' => 1,
                'statusBerjalan' => 0,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!');
    }
}
