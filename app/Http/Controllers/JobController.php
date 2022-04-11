<?php

namespace App\Http\Controllers;

use App\Mail\PrintRequest;
use App\Mail\PrintRequestConfirmation;
use App\Models\Job;
use App\Models\Printer;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function create($id)
    {
        $printer = Printer::find($id);

        return view('create-job')->with('printer', $printer);
    }

    public function store($printerId, $userId)
    {
        $request = \request();

        $request->validate([
            'color' => ['required', 'string', 'max:15'],
            'doubleSided' => ['required', 'string', 'max:15'],
            'numberOfPages' => ['required', 'integer', 'max:100'],
            'fileExtension' => ['required', 'string', 'max:255'],
            'pickupTimeframeStart1' => ['required', 'string', 'max:255'],
            'pickupTimeframeStart2' => ['required', 'string', 'max:255'],
            'pickupTimeframeStart3' => ['required', 'string', 'max:255'],
            'pickupTimeframeEnd1' => ['required', 'string', 'max:255'],
            'pickupTimeframeEnd2' => ['required', 'string', 'max:255'],
            'pickupTimeframeEnd3' => ['required', 'string', 'max:255'],
            'pickupTimeframeDate1' => ['required', 'string', 'max:255'],
            'pickupTimeframeDate2' => ['required', 'string', 'max:255'],
            'pickupTimeframeDate3' => ['required', 'string', 'max:255'],
            'exchangeOffer' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:255'],
        ]);

        $job = new Job();
        $job['printer_id'] = $printerId;
        $job['user_id'] = $userId;
        $job['color'] = $request->color ;
        $job['double_sided'] = $request->doubleSided;
        $job['num_pages'] = $request->numberOfPages;
        $job['file_ext'] = $request->fileExtension;
        $job['exchange_offer'] = $request->exchangeOffer;
        $job['pickup_timeframe_start1'] = $request->pickupTimeframeStart1;
        $job['pickup_timeframe_end1'] = $request->pickupTimeframeEnd1;
        $job['pickup_timeframe_date1'] = $request->pickupTimeframeDate1;
        $job['pickup_timeframe_start2'] = $request->pickupTimeframeStart2;
        $job['pickup_timeframe_end2'] = $request->pickupTimeframeEnd2;
        $job['pickup_timeframe_date2'] = $request->pickupTimeframeDate2;
        $job['pickup_timeframe_start3'] = $request->pickupTimeframeStart3;
        $job['pickup_timeframe_end3'] = $request->pickupTimeframeEnd3;
        $job['pickup_timeframe_date3'] = $request->pickupTimeframeDate3;
        $job['message'] = $request->message;
        $job->save();

        $ownerEmail = $job->printer->user->email;
        $seekerEmail = $job->user->email;

        Mail::to($ownerEmail)
            ->send(new PrintRequest($job));

        Mail::to($seekerEmail)
            ->send(new PrintRequestConfirmation($job));

//        dev: view mail in browser
//        return new PrintRequest($job);

        return redirect(route('home'));
    }
}
