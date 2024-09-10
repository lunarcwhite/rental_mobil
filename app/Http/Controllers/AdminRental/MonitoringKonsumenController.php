<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlokirKonsumen;
use App\Models\Rental;
use App\Models\Pembayaran;
use Auth;

class MonitoringKonsumenController extends Controller
{
    public function index()
    {
        try {
            $data['users'] = Rental::where('profileRentalId', Auth::user()->profileRental->id)->select('userId')->distinct()->get();
            $data['blokirs'] = BlokirKonsumen::where('profileRentalId', Auth::user()->profileRental->id)->get();
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->count();
            // dd($data['users']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return view('errors.500');
        }
        return view('AdminRental.monitoringKonsumen.index')->with($data); 
    }

    public function blokir($id)
    {
        try {
            BlokirKonsumen::create([
                'userId' => $id,
                'profileRentalId' => Auth::user()->profileRental->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!');
    }

    public function bukaBlokir($id)
    {
        try {
            BlokirKonsumen::where('userId', $id)->where('profileRentalId', Auth::user()->profileRental->id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!');
    }
}
