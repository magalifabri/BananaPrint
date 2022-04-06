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
        $printer->save();

        $user = User::find(Auth::id());
        $user['has_printer'] = true;
        $user->save();

        return view('dashboard')->with('user', $user);
    }
}
