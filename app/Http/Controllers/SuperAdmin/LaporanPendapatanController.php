<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class LaporanPendapatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::where('statusPembayaran', 1)->get();
        if ($request->filled('filter')) {
            $date = $request->filter;
            // Memecah string berdasarkan tanda '-'
            [$year, $month] = explode('-', $date);
            $query = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
            ->where('statusPembayaran', 1)->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        }
        try {
            $data['pendapatans'] = $query;
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('SuperAdmin.laporanPendapatan.index')->with($data);
    }
}
