<?php

namespace Neil\MailSetting\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    	'driver',
    	'host',
        'username',
        'password',
        'encryption',
        'port',
        'name',
        'recipient'
    ];
}
