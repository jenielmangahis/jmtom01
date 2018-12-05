<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\MailOut;
use App\MailQueue

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
        $Subject    = "Sample Subject";
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
     * Benchmark testing for "mail_queue" table
     * Test Adding Records
    */
    function testMailQueueModel()
    {
        $mailQueue = DB::table('mail_queue')->where('id', '1')->first();
        print_r($mailQueue);
        exit;
    }
}