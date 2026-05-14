<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Mail\QuoteReceived;
use App\Models\Quote;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function index()
    {
        return view('pages.quote');
    }

    public function submit(QuoteRequest $request)
    {
        $quote = Quote::create([
            'step1_services' => $request->services,
            'step2_details' => [
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'budget' => $request->budget,
                'timeline' => $request->timeline,
                'target_audience' => $request->target_audience,
            ],
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'source' => $request->source,
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new QuoteReceived($quote));
        } catch (\Exception $e) {
            report($e);
        }

        return redirect()->route('quote.thankyou');
    }

    public function thankyou()
    {
        return view('pages.quote-thankyou');
    }
}
