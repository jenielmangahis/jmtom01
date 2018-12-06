<?php

namespace App\Jobs;

use Mail;
use App\Mail\MailTest;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $body = "This is the body";
        $data_mail = array(
            'body' => $body
        );
        $to = "test@globizcloud.com";
        Mail::to($to)
            ->queue(new MailTest($data_mail));
    }
}
