<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Rental;
use Auth;

class LaporanKeuanganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
            ->where('statusPembayaran', 1)
            ->get();
        if ($request->filled('filter')) {
            $date = $request->filter;
            // Memecah string berdasarkan tanda '-'
            [$year, $month] = explode('-', $date);
            $query = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
            ->where('statusPembayaran', 1)->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        }
        try {
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['pembayarans'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->whereNot('statusPembayaran', 2)
                ->get();
            $data['transaksiBerjalan'] = $data['pembayarans']->count();
            $data['pendapatans'] = $query;
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('AdminRental.laporanKeuangan.index')->with($data);
    }
}
