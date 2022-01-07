<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\DocRequest;
use App\User;
use App\Http\Controllers\Controller;
use App\Docs;

class ApiDocsController extends Controller
{
    //
    public function index()
    {
    }

    public function store(DocRequest $request)
    {
        if( !file_exists(storage_path('upload').'/'.$request->input('file')) ) {
            return response('File not found', 404);
        }
        $user = User::where(['name' => $request->input('user')])->first();
        if( !$user ) {
            return response('User not found', 404);
        }
//        $file = $request->file();
        $doc  = $request->except(['user']);
        $doc['user_id'] = $user->id;
        $src = storage_path('upload').'/'.$request->input('file');
        $dst = storage_path('docs').'/'.$user->id.'_'.$request->input('file');
        copy($src,$dst);
        if( file_exists($dst)) {
            unlink($src);
            $doc['file'] = $user->id.'_'.$request->input('file');
            return Docs::create($doc);
        } else {
            return response('Error copy file', 500);
        }
    }
/*    public function update(UsersRequest $request, $email)
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
        $users = User::where('email', $email)->firstOrFail();
        if($users->delete()) return response(null, 204);
    }*/


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
