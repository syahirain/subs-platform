<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Http\Controllers\SendEmailController;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email_history_id;
    /**
     * Create a new job instance.
     */
    public function __construct($email_history_id)
    {
        $this->email_history_id = $email_history_id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $id = $this->email_history_id;

        $result = (new SendEmailController)->send_email($id);
        logger($result);
    }
}
