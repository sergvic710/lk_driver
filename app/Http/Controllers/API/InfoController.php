<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\InfoRequest;
use App\Info;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function index()
    {
    }

    public function store(Request $request)
    {
        $drivers = $request->drivers;
        $notFound = [];
        if( $drivers ) {
            foreach ($drivers as $driver ) {
                $user = User::where(['name' => $driver['DriverID']])->first();
                if( $user ) {
                    $info = Info::where(['DriverID' => $driver['DriverID']])->first();
                    if( !$info ) {
                        $driver['user_id'] = $user->id;
                        Info::create($driver);
                    }
//                    return
                } else {
                    $notFound [] =  $driver['DriverID'];
                }
            }
        }
        if( !empty($notFound) ) {
            return response()->json(['error' => ['Not found' => $notFound]], 404);
        }
//        $info  = $request->except(['user']);

//        return response()->json(['error' => 'Not found stocks'], 400);

    }
    public function update(Request $request, $id)
    {
        $info = Info::where(['DriverID' => $id])->first();
        if( $info  ) {
            if( $info->update($request->toArray())) {
                return response()->json(['message' => 'success'], 200);
            }
        }else {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
    public function destroy(Request $request, $id)
    {
        $info = Info::where(['DriverID' => $id])->first();
        if( $info  ) {
            if( $info->delete()) {
                response()->json(['message' => 'success'], 200);
            }
        }else {
            return response()->json(['error' => 'Record not found'], 404);
        }
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
