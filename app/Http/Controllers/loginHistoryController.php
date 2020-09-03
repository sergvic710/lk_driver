<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loginHistory;
use Illuminate\Support\Facades\Auth;

class loginHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        loginHistory::lastLogin();
        $history = loginHistory::where(['user_id'=>Auth::id()])->get();
        return view('loginHistory',['history' => $history]);
    }
}
