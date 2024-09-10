<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Auth;
use App\Models\Rental;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        try {
        $data['pembayarans'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->orderBy('created_at', 'desc')
                ->get();
                $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->count();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('AdminRental.riwayatTransaksi.index')->with($data);        
    }
    public function invoice($id)
    {
        try {
            $data['pembayaran'] = Pembayaran::where('id', $id)->first();
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->count();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('AdminRental.riwayatTransaksi.invoice')->with($data);
    }
}
