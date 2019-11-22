<?php

namespace App\Http\Controllers;

use App\Game;
use Alert;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('dashboard', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addgame');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:300|string',
        ]);

        $game = new Game;
        $game->name = request('name');
        $game->status = 'Unlocked';
        $game->save();

        return back()->withStatus(__('Game Successfully Added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $games = Game::all();
        return view('welcome', compact('games'));
    }

    public function play(Game $game)
    {
        if ($game->status == 'Unlocked') {

            $game->status = 'Locked';
            $game->save();
            Alert::success('<b>Game Unlocked<br></b> ' . '<span class="h1 font-weight-bold mb-5 display-1 text-uppercase">' . $game->name . '</span>')->html()->persistent("Close");
            return back();
        } else {
            Alert::warning('<b>Locked Game<br></b> ' . '<span class="h2 font-weight-bold mb-5 display-2 text-uppercase">' . 'Already Played Game' . '</span>')->html()->persistent("Close");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:300|string',
        ]);
        $game = Game::find(request('id'));
        $game->name = request('name');
        $game->status = request('status');
        $game->save();

        return back()->withStatus(__('Game Successfully Updated.'));}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
