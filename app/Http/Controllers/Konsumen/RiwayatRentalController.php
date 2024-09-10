<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Rental;
use App\Models\RatingMobil;

class RiwayatRentalController extends Controller
{
    public function index()
    {
        try {
        $userId = Auth::user()->id;
        $data['rentals'] = Rental::where('userId', $userId)->orderBy('created_at', 'desc')->get();
        $data['rating'] = RatingMobil::where('userId', $userId)->get();    
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('Konsumen.riwayatRental.index')->with($data);
    }

    public function ratingMobil(Request $request, $id)
    {
        $request->validate([
            'bintang' => 'required',
            'ulasan' => 'required'
        ]);
        $rental = Rental::where('id', $id)->first();
        try {
            $data = [
                'mobilId' => $rental->mobil->id,
                'userId' => Auth::user()->id,
                'bintang' => $request->bintang,
                'ulasan' => $request->ulasan
            ];

            RatingMobil::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }

        return redirect()->back()->with('success', 'Aksi berhasil');
    }
}
