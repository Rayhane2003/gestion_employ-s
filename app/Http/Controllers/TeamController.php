<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;


class TeamController extends Controller
{
    function store_team(Request $request){

        $teamData = [
           'nomEquipe' => $request->nomEquipe,
           'description' => $request->description,
           'dateCreation' => $request->dateCreation,
           'responsable' => $request->responsable,
           
       ];
       Team::create($teamData);
       return response()->json([
           'status' => 200,
       ]);
}
public function updateTeam(Request $request)
    {
        $Team = Team::find($request->idEquipes);
            if ($Team) {
            
                $Team->nomEquipe  = $request->nomEquipes;
                  $Team->description  = $request->description;
                $Team->dateCreation = $request->dateCreation;
                $Team-> responsable = $request->responsable;
            $Team->save();
            return response()->json([
                'status' => 200,
                'message' => 'Equipe a été mise à jour avec succès.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Equipe non trouvé.'
            ]);
        }
    }
public function delete(Request $request)
{
    $Team = Team::find($request->idEquipes);
    if ($Team && $Team->delete()) {
        return response()->json(['status' => 200, 'message' => 'Equipe a été supprimée avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Échec de la suppression.']);
    }
}
}