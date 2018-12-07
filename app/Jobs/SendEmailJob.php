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
        $uid = "1di6doe8ft";
        $to  = "test@globizcloud.com";
        Mail::to($to)
            ->getSwiftMessage()
            ->getHeaders()
            ->addTextHeader('X-Mailgun-Dkim', 'true');
            ->addTextHeader('X-Mailgun-Track', 'true');
            ->addTextHeader('X-Mailgun-Track-Clicks', 'true');
            ->addTextHeader('X-Mailgun-Track-Opens', 'true');
            ->addTextHeader('X-Mailgun-Variables', '{"uid": "' . $uid . '"}');
            ->queue(new MailTest($data_mail));
    }
}
