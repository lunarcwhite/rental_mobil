<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\PersetujuanMobil;
use Auth;
use Storage;
use App\Models\Pembayaran;
use App\Models\Rental;

class KelolaMobilController extends Controller
{
    public function index()
    {
        try {
            $idRental = Auth::user()->profileRental->id;
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', $idRental)->whereNotExists($rental)->whereNot('statusPembayaran', 2)->count();

            $data['mobils'] = Mobil::where('profileRentalId', $idRental)->orderBy('namaMobil', 'asc')->paginate(25);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return view('errors.500');
        }
        return view('AdminRental.kelolaMobil.index')->with($data);
    }

    public function create()
    {
        try {
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->whereNot('statusPembayaran', 2)
                ->count();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('AdminRental.kelolaMobil.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMobil' => 'required',
            'platMobil' => 'required|unique:mobils,platMobil',
            'jumlahKursi' => 'required',
            'gigi' => 'required',
            'bahanBakar' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        try {
            $foto = $request->gambar;
            $profileRental = Auth::user()->profileRental->id;

            $extension = $foto->extension();
            $filename = 'mobil_' . $request->namaMobil . '_' . time() . '_' . $profileRental . '.' . $extension;
            $foto->storeAs('public/mobil/', $filename);
            $data = $request->input();
            $data['gambar'] = $filename;
            $data['profileRentalId'] = $profileRental;
            Mobil::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal')->withInput();
        }
        return redirect()->route('adminRental.kelolaMobil.index')->with('success', 'Aksi Berhasil');
    }

    public function edit($id)
    {
        try {
            $data['mobil'] = Mobil::where('id', $id)->first();
            $data['penolakans'] = PersetujuanMobil::where('mobilId', $id)->get();
            $rental = Rental::where('statusSelesai', 1)->whereColumn('rentals.pembayaranId', 'pembayarans.id');
            $data['transaksiBerjalan'] = Pembayaran::where('profileRentalId', Auth::user()->profileRental->id)
                ->whereNotExists($rental)
                ->whereNot('statusPembayaran', 2)
                ->count();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('AdminRental.kelolaMobil.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMobil' => 'required',
            'platMobil' => 'required',
            'jumlahKursi' => 'required',
            'gigi' => 'required',
            'bahanBakar' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg',
        ]);

        try {
            $mobil = Mobil::where('id', $id)->first();
            $profileRental = Auth::user()->profileRental->id;
            $data = $request->except('_method', '_token');
            if (array_key_exists('gambar', $data)) {
                $foto = $data['gambar'];
                Storage::delete('public/mobil/' . $mobil->gambar);
                $extension = $foto->extension();
                $filename = 'mobil_' . $request->namaMobil . '_' . time() . '_' . $profileRental . '.' . $extension;
                $foto->storeAs('public/mobil/', $filename);
                $data['gambar'] = $filename;
            }
            Mobil::where('id', $id)->update($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi Gagal')->withInput();
        }
        return redirect()->route('adminRental.kelolaMobil.index')->with('success', 'Aksi Berhasil');
    }

    public function aktif(Request $request, $id)
    {
        try {
            Mobil::where('id', $id)->update([
                'statusAktif' => $request->statusAktif,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }

        return redirect()->back()->with('success', 'Aksi berhasil!');
    }

    public function destroy($id)
    {
        try {
            $mobil = Mobil::where('id', $id)->first();
            Storage::delete('public/mobil/' . $mobil->gambar);

            Mobil::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }

        return redirect()->back()->with('success', 'Aksi berhasil!');
    }
}
