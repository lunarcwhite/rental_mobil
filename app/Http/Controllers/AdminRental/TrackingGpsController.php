<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GPS;
use Auth;
use App\Models\Rental;
use App\Models\Pembayaran;

class TrackingGpsController extends Controller
{
    public function index()
    {
        try {
            $idRental = Auth::user()->profileRental->id;
            $data['mobils'] = GPS::where('profileRentalId', $idRental)->get();
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', $idRental)
                ->whereNotExists($rental)
                ->whereNot('statusPembayaran', 2)
                ->count();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('AdminRental.trackingGps.index')->with($data);
    }

    public function show($id)
    {
        try {
            $idRental = Auth::user()->profileRental->id;
            $data['gps'] = GPS::where('id', $id)->first();
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', $idRental)
                ->whereNotExists($rental)
                ->whereNot('statusPembayaran', 2)
                ->count();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('AdminRental.trackingGps.show')->with($data);
    }
}
