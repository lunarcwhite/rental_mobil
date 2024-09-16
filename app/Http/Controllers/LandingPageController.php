<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\RatingMobil;
use App\Models\Pembayaran;
use App\Models\Rental;
use App\Models\BlokirKonsumen;
use Auth;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (Auth::check() && Auth::user()->accountVerified == 1 && Auth::user()->roleId == 2) {
                $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
                $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                    ->whereNotExists($rental)
                    ->whereNot('statusPembayaran', 2)
                    ->count();
            }
            $data['cariMobil'] = $request->cariMobil;
            // Jika ada parameter cariMobil, lakukan pencarian
            if ($request->filled('cariMobil') && $request->cariMobil != '') {
                $mobils = Mobil::where('namaMobil', 'like', "%{$request->cariMobil}%")
                    ->where('statusAktif', 1)
                    ->where('statusPersetujuan', 1)
                    ->paginate(35);
            } else {
                // Jika tidak ada, kembalikan hasil kosong atau semua data
                $mobils = Mobil::where('statusAktif', 1)->where('statusPersetujuan', 1)->paginate(35);
            }
            $data['blacklists'] = BlokirKonsumen::all();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return view('errors.500');
        }
        $data['mobils'] = $mobils;
        return view('LandingPage.index')->with($data);
    }

    public function show($id)
    {
        try {
            $data['mobil'] = Mobil::where('id', $id)->first();
            $data['ratings'] = RatingMobil::where('mobilId', $id)->get();
            if (Auth::check() && Auth::user()->roleId == 2) {
                $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
                $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                    ->whereNotExists($rental)
                    ->count();
            }
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('LandingPage.show')->with($data);
    }

    public function syaratKetentuan()
    {
        return view('LandingPage.syaratKetentuan');
    }
}
