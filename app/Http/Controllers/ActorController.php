<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function listActors()
    {
        // 1. Get all actors using Eloquent ORM
        $actors = Actor::all();

        // 2. Return list view with actors data
        return view('actors.list', compact('actors'));
    }
}