<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pembayaran;
use App\Models\Mobil;

class PembayaranController extends Controller
{
    public function index()
    {
        try {
            $data['pembayarans'] = Pembayaran::where('userId', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('Pembayaran.index')->with($data);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'tanggalMulai' => 'required',
            'tanggalKembali' => 'required',
        ]);

        $tanggal = $request->tanggalMulai;
        $pembayaran = Pembayaran::where('mobilId', $id)->where('tanggalMulai', '<=', $tanggal)->where('tanggalKembali', '>=', $tanggal)->first();
        $pembayaran2 = Pembayaran::where('mobilId', $id)
            ->where('tanggalMulai', '>=', $tanggal)
            ->where('tanggalMulai', '<=', $request->tanggalKembali)
            ->first();
        if ($pembayaran != null) {
            // dd('ada');
            return redirect()->back()->withErrors('Mobil sudah memiliki jadwal rental pada tanggal tersebut!')->withInput();
        }
        if ($pembayaran2 != null) {
            // dd('ada');
            return redirect()->back()->withErrors('Mobil sudah memiliki jadwal rental pada tanggal tersebut!')->withInput();
        }

        if ($request->tanggalMulai > $request->tanggalKembali) {
            // dd('ada');
            return redirect()->back()->withErrors('Tanggal mulai tidak boleh lebih dari tanggal kembali!')->withInput();
        }

        if ($request->tanggalMulai < date('Y-m-d')) {
            // dd('ada');
            return redirect()->back()->withErrors('Tanggal mulai tidak boleh lebih kurang dari tanggal hari ini!')->withInput();
        }

        $tanggalMulai = date_create($request->tanggalMulai);

        $tanggalKembali = date_create($request->tanggalKembali);

        $interval = date_diff($tanggalMulai, $tanggalKembali);

        $selisih = $interval->days;

        $mobil = Mobil::where('id', $id)->first();
        $harusBayar = ($mobil->harga + ($mobil->harga * 10) / 100) * $selisih;
        $pendapatanRental = $mobil->harga * $selisih;

        try {
            $data = $request->input();
            $data['mobilId'] = $id;
            $data['userId'] = Auth::user()->id;
            $data['harusBayar'] = $harusBayar;
            $data['durasiRental'] = $selisih;
            $data['kodePembayaran'] = rand(00000000, 99999999);
            $data['profileRentalId'] = $mobil->profileRentalId;
            $data['pendapatanRental'] = $pendapatanRental;
            $data['pendapatanAplikasi'] = $harusBayar - $pendapatanRental;
            $checkout = Pembayaran::create($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi Gagal')->withInput();
        }
        return redirect()
            ->route('pembayaran.checkout', $checkout->id)
            ->with('success', 'Aksi Berhasil')
            ->withInput();
    }

    public function checkout($id)
    {
        try {
            $pembayaran = Pembayaran::where('id', $id)->first();
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $pembayaran->id,
                    'gross_amount' => $pembayaran->harusBayar,
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return view('errors.500');
        }

        $data['pembayaran'] = $pembayaran;
        $data['snapToken'] = $snapToken;

        return view('Pembayaran.checkout')->with($data);
    }

    public function invoice($id)
    {
        try {
            $data['pembayaran'] = Pembayaran::where('id', $id)->first();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('Pembayaran.invoice')->with($data);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                Pembayaran::where('id', $request->order_id)->update([
                    'totalBayar' => $request->gross_amount,
                    'statusPembayaran' => 1,
                ]);
            }
        }
    }
}
