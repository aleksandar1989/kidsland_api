<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Api form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('api.index');
    }

    /**
     * Get the results from api
     *
     * @return \Illuminate\Http\Response
     */
    public function getStock(ApiRequest $request){
        if ($request->ajax()) {
            $sifra = $request->sifra ? $request->sifra : $request->barkod;
            $barkod = $request->barkod ? $request->barkod : $request->sifra;

            $client = new Client();
            $data = $client->get('http://213.149.116.38/Donator/DonatorB2BJson.svc/getstock/' . $sifra . '/' . $barkod, ['auth' => ['SmartWeb', 'D0n@46!t0r2$73']]);

            $result = json_decode($data->getBody());
            return view('api.index', compact('result'));
        }
    }
}
