<?php

namespace App\Listeners;

use App\loginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Psy\Command\HistoryCommand;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $history['login_at'] = now();
        $history['user_id'] = Auth::id();
        return loginHistory::create($history);
    }
}
