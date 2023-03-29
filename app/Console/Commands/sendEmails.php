<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SendEmailController;

class sendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare to send newsletter for new website post to every subscriber';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        (new SendEmailController)->fn_prepare_send_email();
    }
}
