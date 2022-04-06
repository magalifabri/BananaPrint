<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrinterController extends Controller
{
    public function create()
    {
        return view('create-printer');
    }

    public function store()
    {
        $request = \request();

        $request->validate([
            'street' => ['required', 'string', 'max:255'],
            'streetNumber' => ['required', 'integer'],
            'zipcode' => ['required'],
        ]);

        $printer = new Printer;
        $printer['user_id'] = Auth::id();
        $printer['color'] = $request->color;
        $printer['double_sided'] = $request->doubleSided ?? false;
        $printer['street'] = $request->street;
        $printer['street_number'] = $request->streetNumber;
        $printer['zipcode'] = $request->zipcode;

        $latLong = $this->getLatLong($request->street, $request->streetNumber, $request->zipcode);

        $printer['lat'] = $latLong['lat'];
        $printer['long'] = $latLong['long'];

        $printer->save();

        $user = User::find(Auth::id());
        $user['has_printer'] = true;
        $user->save();

        return view('dashboard')->with('user', $user);
    }

    private function getLatLong($street, $streetNumber, $zipcode)
    {
        $apiToken = env('MAPBOX_API_TOKEN');

        $responseJson = file_get_contents("https://api.mapbox.com/geocoding/v5/mapbox.places/{$street}+{$streetNumber}+{$zipcode}.json?proximity=ip&access_token={$apiToken}");
        $responseAssoc = json_decode($responseJson);
        $lat = $responseAssoc->features[0]->center[1];
        $long = $responseAssoc->features[0]->center[0];

        return [
            'lat' => $lat,
            'long' => $long
        ];
    }

    public function getAllLocations()
    {
        return [
            Printer::pluck('long'),
            Printer::pluck('lat'),
        ];
    }
}
