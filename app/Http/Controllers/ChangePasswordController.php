<?php
namespace App\Http\Controllers;



use App\Http\Requests\ChangePassword;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(ChangePassword $request)
    {
        $request->validated();
/*        $request->validate([
//            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);*/
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
//        dd('Password change successfully.');
        return view('changePassword',['status' => 'Пароль успешно изменен!']);
    }
}
