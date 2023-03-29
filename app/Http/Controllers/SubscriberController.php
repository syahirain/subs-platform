<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\subscriber;

class SubscriberController extends Controller
{
    function fn_create_subscriber(SubscriberRequest $request)
    {
        $subscriber = subscriber::create($request->all());

        if($subscriber->exists)
        {
            return json_encode([
                'success' => true,
                'message' => "Data insert success",
                'data' => $subscriber
            ]);
        } 
        else
        {
            return json_encode([
                'success' => false,
                'message' => "Insertion error",
                'data' => []
            ]);
        }
    }
}
