<?php

namespace App\Http\Controllers;

use App\Http\Requests\Player\StorePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search') ?? null;
        $players = Player::with('team')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->get();
        return view('players.index', ['players' => $players]);
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', ['teams' => $teams]);
    }

    public function store(StorePlayerRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->toArray();
            Player::create($data);
            DB::commit();

            return redirect()->route('players.index')->with('success', 'Player created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('players.index')->with('error', 'Failed to create player: ' . $e->getMessage());
        }
    }

    public function show(Player $player)
    {
        return view('players.show', ['player' => $player]);
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', ['player' => $player, 'teams' => $teams]);
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        DB::beginTransaction();

        try {
            $player->update($request->toArray());
            DB::commit();

            return redirect()->route('players.index')->with('success', 'Player updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('players.index')->with('error', 'Failed to update player: ' . $e->getMessage());
        }
    }

    public function destroy(Player $player)
    {
        DB::beginTransaction();

        try {
            $player->delete();
            DB::commit();

            return redirect()->route('players.index')->with('success', 'Player deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('players.index')->with('error', 'Failed to delete player: ' . $e->getMessage());
        }
    }
}