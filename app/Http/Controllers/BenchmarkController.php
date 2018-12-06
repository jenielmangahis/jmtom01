<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MailOut;
use App\MailQueue;

//use Illuminate\Support\Facades\Mail;
//use Mail;
//use App\Mail\MailTest;

use App\Jobs\SendEmailJob;
use DB;


class BenchmarkController extends Controller
{
    public function __construct()
    {

    }

    /*
     * Benchmark testing for "mail_out" table
     * Test Adding Records
    */
    function testMailOutModel()
    {
    	echo "<h2>Test MailOut Model</h2>";
        $uid        = "896-63-4";
        $from       = "admin@test.com";
        $to         = "person@person.com";
        $subject    = "Sample Subject";
        $body       = "This a sample content";
        $html       = "<p>This is a sample content</p>";
        $text       = "This is a sample text";

    	$mo = new MailOut;
	    $mo->uid      = $uid;
	    $mo->from     = $from;
	    $mo->to  	  = $to;
	    //$mo->cc  	  = '';
	    //$mo->bcc    = '';
	    $mo->subject  = $subject;
	    $mo->body  	  = $body;
	    $mo->text  	  = $text;
	    $mo->html  	  = $html;
	    $mo->save(); 
    }

    /*
     * Benchmark
     * Test Adding Records
    */
    function testMailQueueModel()
    {
        //Fetch mailQueue setting
        $mail_queue_id 	= 1;
        $mailQueue 		= MailQueue::where('id', '=', $mail_queue_id)->first();

        if($mailQueue) {

	        //Fetch mailOut data from last sent id
	        $mailOut = MailOut::where('id', '>', $mailQueue->last)->limit($mailQueue->sent)->get();
	        if($mailOut) {

		        if(!empty($mailOut->toArray())) {
			        //loop mailOut data
			        $total_sent = 0;
			        $last_id    = 0;
			        foreach( $mailOut->toArray() as $mkey => $m ){

			        	$id 	 = $m['id'];
			        	$uid 	 = $m['uid'];
			        	$from 	 = $m['from'];
			        	$to 	 = $m['to'];
			        	$cc      = $m['cc'];
			        	$subject = $m['subject'];
			        	$body    = $m['body'];

			            /*
						 * Send Email Here
			            */

			            $last_id = $id;
			            $total_sent++;
			        }

			        $mailQueue->last    = $last_id; //Update mailQueue - save last id in mailOut sent
			        $mailQueue->total   = $mailQueue->sent + $total_sent; //Update mailQueue - update total sent
			        $mailQueue->save();	       

		        }
 	
	        }
        }

    }

    function testEmailSending()
    {
    	echo '<h2>Test Email Sending</h2>';
    	echo '<hr />';
    	$data = array();

        /*Mail::to('bryann.revina@gmail.com')
            ->send(new MailTest($data));*/

        /*$job = (new SendEmailJob()
            ->delay(Carbon::now()->addSeconds(5))
        );
        dispatch($job);	*/

    }

    /*
	 * Test for Mail Queue
    */
    function mailQue()
    {
        $uid        = "896-96";
        $from       = "admin@test.com";
        $to         = "person@person.com";
        $subject    = "Sample Subject";
        $body       = "This a sample content";
        $html       = "<p>This is a sample content</p>";
        $text       = "This is a sample text";

        //SendEmailJob::dispatch();
        SendEmailJob::dispatch()
                ->delay(now()->addSeconds(5));

        /*$mo = new MailOut;
        $mo->uid      = $uid;
        $mo->from     = $from;
        $mo->to       = $to;
        $mo->subject  = $subject;
        $mo->body     = $body;
        $mo->text     = $text;
        $mo->html     = $html;
        $mo->save();*/ 

        echo "Send Email Queue";
    }
}