<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function listActors()
    {
        $actors = Actor::all();

        return view('actors.list', compact('actors'));
    }

    public function listActorsByDecade($year)
    {
        $actors = Actor::whereBetween('birthdate', [
            $year . '-01-01',
            ($year + 9) . '-12-31'
        ])->get();

        return view('actors.list', compact('actors'));
    }

    public function countActors()
    {
        $count = Actor::count();

        return view('actors.count', compact('count'));
    }

    public function destroy($id)
    {
        $actor = Actor::find($id);

        if ($actor) {
            $actor->delete();

            return response()->json([
                "action" => "delete",
                "status" => true
            ]);
        }

        return response()->json([
            "action" => "delete",
            "status" => false
        ]);
    }
}
