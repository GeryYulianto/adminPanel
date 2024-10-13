<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Teams\StoreTeamRequest;
use App\Http\Requests\Teams\UpdateTeamRequest;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search') ?? null;
        $teams = Team::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->get();
        return view('teams.index', ['teams' => $teams]);
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        DB::beginTransaction();

        try {
            $uuid = Str::uuid();
            $team = Team::create($request->toArray());
            DB::commit();

            return redirect()->route('teams.index')->with('success', 'Team created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('teams.index')->with('error', 'Failed to create team: ' . $e->getMessage());
        }
    }

    public function show(Team $team)
    {
        return view('teams.show', ['team' => $team]);
    }

    public function edit(Team $team)
    {
        return view('teams.edit', ['team' => $team]);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        DB::beginTransaction();

        try {
            $team->update($request->toArray());
            DB::commit();

            return redirect()->route('teams.index')->with('success', 'Team updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('teams.index')->with('error', 'Failed to update team: ' . $e->getMessage());
        }
    }

    public function destroy(Team $team)
    {
        DB::beginTransaction();

        try {
            $team->delete();
            DB::commit();

            return redirect()->route('teams.index')->with('success', 'Team deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('teams.index')->with('error', 'Failed to delete team: ' . $e->getMessage());
        }
    }
}