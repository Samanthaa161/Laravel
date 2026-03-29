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

    // List actors born in a specific decade
    // For example, if $year is 1980, it will list actors born 
    //between 1980-01-01 and 1989-12-31
    //este paso esta hehco con JavaScript, 
    // pero lo dejo aqui para que se vea como se haria con PHP
    // en el caso de que se quiera hacer con PHP, se podria hacer
    // una consulta a la base de datos para obtener los actores que 
    //nacieron en esa decada y luego se podria mostrar esa lista 
    //de actores en una vista
    // ejemplo de consulta a la base de datos para obtener los actores
    // que nacieron en la decada de 1980
    // $actors = Actor::whereBetween('birthdate', [
    //     '1980-01-01',    
    //     '1989-12-31'
    // ])->get();

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
