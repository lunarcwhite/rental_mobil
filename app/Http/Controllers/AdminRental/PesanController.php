<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Pembayaran;
use Auth;
use App\Models\Pesan;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mobil;

class PesanController extends Controller
{
    public function index()
    {
        $idRental = Auth::user()->profileRental->id;
        try {
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['pembayarans'] = Pembayaran::where('profileRentalId', $idRental)->whereNotExists($rental)->whereNot('statusPembayaran', 2)->get();
            $data['transaksiBerjalan'] = $data['pembayarans']->count();
            $data['pesans'] = Pesan::where('profileRentalId', $idRental)->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('AdminRental.pesan.index')->with($data);
    }

    public function show($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $data['mobil'] = Mobil::where('id', $decryptedId)->first();
        $data['pesan'] = Pesan::where('channel', $id)->first();
        // dd($data['pesan']);
        return view('AdminRental.pesan.show')->with($data);
    }
}
