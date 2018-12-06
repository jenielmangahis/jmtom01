<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\SendEmailJob;
use App\MailOut;
use DB;

class MailQueueController extends Controller
{
    public function __construct()
    {
    }

    function sendMailQueue()
    {
        $uid        = "896-96";
        $from       = "admin@test.com";
        $to         = "person@person.com";
        $subject    = "Sample Subject";
        $body       = "This a sample content";
        $html       = "<p>This is a sample content</p>";
        $text       = "This is a sample text";

        /*
		 * Dispatch sending email with 5 seconds delay
        */
        SendEmailJob::dispatch()
                ->delay(now()->addSeconds(5));

        /*
		 * Outgoing message also be save in database
        */
        /*
        $mo = new MailOut;
        $mo->uid      = $uid;
        $mo->from     = $from;
        $mo->to       = $to;
        $mo->subject  = $subject;
        $mo->body     = $body;
        $mo->text     = $text;
        $mo->html     = $html;
        $mo->save();
        */ 

        echo "Send Email Queue Successful";
    }    
}
