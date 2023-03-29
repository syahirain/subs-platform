<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\newsletter;
// use App\Models\website;

class NewsletterController extends Controller
{
    function fn_create_newsletter(NewsletterRequest $request)
    {
        
        $newsletter = newsletter::create($request->all());

        if ($newsletter->exists)
        {
            return json_encode([
                'success' => true,
                'message' => "Data insert success",
                'data' => $newsletter
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
