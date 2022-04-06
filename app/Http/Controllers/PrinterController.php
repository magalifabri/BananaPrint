<?php

namespace App\Http\Controllers;

use App\Models\Printer;
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
        $printer['street'] = $request->street;
        $printer['street_number'] = $request->streetNumber;
        $printer['zipcode'] = $request->zipcode;
        $printer->save();

        dd($request);
    }
}
