<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginHistory extends Model
{
    protected $table = 'login_history';
    protected $fillable = [
        'user_id','login_at'
    ];
}
