<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailQueue extends Model
{
	protected $table = 'mail_queue';
    use SoftDeletes;
}
