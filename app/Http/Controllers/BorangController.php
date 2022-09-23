<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorangRequest;
use App\Http\Requests\UpdateBorangRequest;
use App\Models\Borang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BorangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorangRequest $request)
    {
        $borang = new Borang();
        $borang->nama = $request['nama'];
        $borang->no_kp = $request['no_kp'];
        $borang->telefon = $request['telefon'];
        $borang->catatan = $request['catatan'];
        $borang->code = $this->codeGenerator();
        $borang->save();

        $this->sendSMS($borang);

        return to_route('borang.pengesahan', [
            'borang' => $borang,
        ]);
    }

    public function sendSMS(Borang $borang)
    {
        // dd($borang);
        $sms = Http::withHeaders([
            'Authorization' => config('mysms.api_key'),
            'Content-Type' => 'application/json'
        ])
            ->post(config('mysms.url'), [
                "keyword" => "KPKT",
                "message" => "Kod Pengesahan anda adalah " . $borang->code,
                "msisdn" => $borang->telefon,
            ]);

        return $sms;
    }

    public function codeGenerator()
    {
        return rand(000000, 999999);
    }

    public function pengesahan(Borang $borang)
    {
        return view('Pengesahan', [
            'borang' => $borang,
        ]);
    }

    public function pengesahan_store(Request $request, Borang $borang)
    {
        if ($request['code'] === $borang->code) {
            $borang->is_verified = true;
            $borang->save();

            return 'Berjaya';
        }

        return 'Pengesahan Gagal';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function show(Borang $borang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function edit(Borang $borang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorangRequest  $request
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorangRequest $request, Borang $borang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borang $borang)
    {
        //
    }
}
