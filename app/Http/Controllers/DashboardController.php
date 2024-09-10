<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PersetujuanAkun;
use App\Models\Pembayaran;
use App\Models\Rental;
use App\Models\Mobil;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data['penolakans'] = PersetujuanAkun::where('userId', $user->id)->get();
        if ($user->roleId == 1) {
            $data['mobil'] = Mobil::count();
            $data['konsumen'] = Profile::count();
            $data['transaksi'] = Pembayaran::count();
            $pendapatans = Pembayaran::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->where('statusPembayaran', 1)
                ->get();
            $pendapatan = 0;
            foreach ($pendapatans as $key => $value) {;
                $pendapatan += $value->pendapatanRental;
            }
            $data['pendapatan'] = $pendapatan;
            return view('superAdmin.dashboard.index')->with($data);
        } elseif ($user->roleId == 2) {
            $idRental = $user->profileRental->id;
            $data['mobil'] = Mobil::where('profileRentalId', $idRental)->count();
            $data['konsumen'] = Rental::where('profileRentalId', $idRental)
                ->select('userId')
                ->distinct()
                ->count();
            $data['transaksi'] = Pembayaran::where('profileRentalId', $idRental)->count();
            $pendapatans = Pembayaran::where('profileRentalId', $idRental)
                ->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->where('statusPembayaran', 1)
                ->get();
            $pendapatan = 0;
            foreach ($pendapatans as $key => $value) {;
                $pendapatan += $value->pendapatanRental;
            }
            $data['pendapatan'] = $pendapatan;
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->count();
            return view('adminRental.dashboard.index')->with($data);
        } elseif ($user->roleId == 3) {
            if (Auth::user()->accountVerified == 1) {
                return redirect()->route('landingPage');
            }
            return view('konsumen.dashboard.index')->with($data);
        }
    }
}
