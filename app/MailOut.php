<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailOut extends Model
{
	protected $table = 'mail_out';
    use SoftDeletes;
}
