<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Player;

class PlayerController extends Controller
{
    // Collect
    public function collect() {
        $players = Player::orderBy('id', 'desc')->get();
        return $players;
    }

    // Get
    public function get(Player $player) {
        return $player;
    }

    // Put
    public function put(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'about' => 'required',
        ]);

        $player = new Player;
        $player->name = $request->name;
        $player->email = $request->email;
        $player->phone = $request->phone;
        $player->about = $request->about;
        $player->save();

        return $player;
    }

    // Patch
    public function patch(Player $player, Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'about' => 'required',
        ]);

        $player->name = $request->name;
        $player->email = $request->email;
        $player->phone = $request->phone;
        $player->about = $request->about;
        $player->save();

        return $player;
    }

    // Delete
    public function delete(Player $player) {

        $response = $player;
        $player->delete();

        return $response;
    }
}
