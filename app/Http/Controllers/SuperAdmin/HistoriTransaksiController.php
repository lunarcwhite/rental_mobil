<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class HistoriTransaksiController extends Controller
{
    public function index()
    {
        try {
            $data['pembayarans'] = Pembayaran::orderBy('created_at', 'desc')->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('SuperAdmin.historiTransaksi.index')->with($data);
    }

    public function invoice($id)
    {
        try {
            $data['pembayaran'] = Pembayaran::where('id', $id)->first();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.500');
        }
        return view('SuperAdmin.historiTransaksi.invoice')->with($data);
    }
}
