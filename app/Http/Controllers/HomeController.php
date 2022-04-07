<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contactOwner($id)
    {
        $owner = User::find($id);

        return view('contact-owner-form')->with('owner', $owner);
    }

    public function handleForm()
    {
        $request = \request();

        $request->validate([
            'color' => ['required', 'string'],
            'sided' => ['required', 'string'],
            'numPages' => ['required', 'integer', 'max:100'],
            'fileSize' => ['required', 'string', 'max:20'],
            'pickupTimeframeStart1' => ['required'],
            'pickupTimeframeStart2' => ['required'],
            'pickupTimeframeStart3' => ['required'],
            'pickupTimeframeEnd1' => ['required'],
            'pickupTimeframeEnd2' => ['required'],
            'pickupTimeframeEnd3' => ['required'],
            'pickupTimeframeDate1' => ['required', 'date', 'after_or_equal:today'],
            'pickupTimeframeDate2' => ['required', 'date', 'after_or_equal:today'],
            'pickupTimeframeDate3' => ['required', 'date', 'after_or_equal:today'],
            'exchangeOffer' => ['required', 'string', 'max:50'],
            'message' => ['string', 'max:255'],
        ]);
    }
}
