<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MailOut;

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

    	$mo = new MailOut;
	    $mo->uid      = "896-63-4";
	    $mo->from     = "admin@test.com";
	    $mo->to  	  = 'person@person.com';
	    //$mo->cc  	  = '';
	    //$mo->bcc    = '';
	    $mo->subject  = 'Sample Subject';
	    $mo->body  	  = 'body';
	    $mo->text  	  = 'text...';
	    $mo->html  	  = 'htmls..<br /> this is only a tes <hr />';
	    $mo->save(); 

    }
}