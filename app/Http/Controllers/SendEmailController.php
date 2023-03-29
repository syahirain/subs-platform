<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newsletter;
use App\Models\website;
use App\Models\subscriber;
use App\Models\email_history;

use Mail;

class SendEmailController extends Controller
{
    function fn_prepare_send_email(){

        $websites = website::all();

        foreach($websites as $k => $website)
        {
            $newsletters = newsletter::where('website_id', '=', $website['id'])->where('status', '=', 'PENDING')->get();
            $subscribers = subscriber::where('website_id', '=', $website['id'])->get();

            foreach($newsletters as $k1 => $newsletter)
            {
                foreach($subscribers as $k2 => $subscriber)
                {
                    $email_history = email_history::create([
                        'website_id' => $website['id'],
                        'newsletter_id' => $newsletter['id'],
                        'subscriber_id' => $subscriber['id']
                    ]);

                    if ($email_history->exists)
                    {
                        \App\Jobs\SendEmail::dispatch($email_history->id);
                    }
                }
            }
            
        }

        return json_encode([
            'success' => false,
            'message' => "Email preparation success",
            'data' => []
        ]); 
    }

    public function send_email($id){
        $email_history = email_history::find($id);
        $newsletter = newsletter::find($email_history->newsletter_id);
        $subscriber = subscriber::find($email_history->subscriber_id);

        if ($email_history->exists && $newsletter->exists && $subscriber->exists){
            Mail::raw($newsletter->content, function ($message) use($subscriber,$newsletter){
                $message->to($subscriber->email, $subscriber->name)->subject($newsletter->title);
                $message->from('syahiranahmad@gmail.com','Ahmad Syahiran');
            });
        }
        
    }
}
