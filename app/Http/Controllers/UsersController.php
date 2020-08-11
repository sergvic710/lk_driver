<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function index()
    {
        return User::all();
    }

    public function store(UsersRequest $request)
    {
        $user = $request->validated();
        $user['password'] = Hash::make($user['password']);
        return User::create($user);
    }
    public function update(UsersRequest $request, $email)
    {
        $users = User::where('email', $email)->firstOrFail();
//        $users = users::findOrFail($id);
        $user = $request->except(['email']);
        if( isset($user['password'])) {
            $user['password'] = Hash::make($user['password']);
        }
        $users->fill($user);
        $users->save();
        return response()->json($users);
    }
    public function destroy(UsersRequest $request, $email)
    {
        $users = User::where('email', $email)->first();
        if( $users ) {
            if ($users->delete()) return response(null, 204);
        } else {
            return response('User not found', 404);
        }
    }
    public function show(UsersRequest $request)
    {
        return $user = User::findOrFail($request);
    }

    /*    public function show(Game $game)
        {
            return $game = Game::findOrFail($game);
        }

        public function update(GameRequest $request, $id)
        {
            $game = Game::findOrFail($id);
            $game->fill($request->except(['game_id']));
            $game->save();
            return response()->json($game);
        }

        public function destroy(GameRequest $request, $id)
        {
            $game = Game::findOrFail($id);
            if($game->delete()) return response(null, 204);
        }*/
}
