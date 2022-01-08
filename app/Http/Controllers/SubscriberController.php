<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use App\Models\WebsiteSubscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Website $website)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $subscriber = Subscriber::where('email', $request->input('email'))->first();
        if (!$subscriber) $subscriber = Subscriber::create($request->all());
        WebsiteSubscriber::create([
            'website_id' => $website->id,
            'subscriber_id' => $subscriber->id
        ]);
        return response()->json($subscriber, 201);
    }
}
