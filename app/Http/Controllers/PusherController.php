<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Events\PusherBroadcast;
use Auth;
use App\Models\Mobil;
use Illuminate\Support\Facades\Crypt;

class PusherController extends Controller
{
    public function index($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $data['mobil'] = Mobil::where('id', $decryptedId)->first();
        return view('Pesan.index')->with($data);
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        $id = $request->mobilId;

        $mobil = Mobil::where('id', $id)->first();
        $pesan = Pesan::where('userId', Auth::user()->id)->where('profileRentalId', $mobil->profileRentalId)->first();

        if($pesan != null){
            Pesan::create([
                'userId' => Auth::user()->id,
                'profileRentalId' => $mobil->profileRentalId,
                'channel' => Crypt::encrypt($id),
            ]);
        }

        return view('Pesan.broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('Pesan.receive', ['message' => $request->get('message')]);
    }
}
