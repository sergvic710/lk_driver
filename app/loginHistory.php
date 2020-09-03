<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class loginHistory extends Model
{
    protected $table = 'login_history';
    protected $fillable = [
        'user_id','login_at'
    ];
    static public function lastLogin() {
        $history = loginHistory::where(['user_id'=>Auth::id()])
            ->orderBy('login_at', 'desc')
            ->take(2)
            ->get();
        if(count($history) >= 2) {
            return $history[1]->login_at;
        }elseif( count($history) >= 2 ) {
            return '';
        }
    }
}
