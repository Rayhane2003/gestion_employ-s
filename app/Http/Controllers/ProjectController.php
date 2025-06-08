<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Team;



class ProjectController extends Controller
{
    function store_project(Request $request){

          $projectData = [
             'nomProjet' => $request->nomProjet,
             'description' => $request->description,
             'priorite' => $request->priorite,
             'budget' => $request->budget,
             'dateDebut' => $request->dateDebut,
             'dateFin' => $request->dateFin,
             'responsable' => $request->responsable,
             'idEquipe' => $request->equipe_id

             
         ];
         Project::create($projectData);
         return response()->json([
             'status' => 200,
         ]);
}


public function getallTeams()
{
    try {
        $equipe = Team::all();
    return response()->json([
        'status' => 200,
        'equipes' => $equipe
    ]);
      
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
   
}

public function getall()
{
    try {
        $team =  DB::table('projet')
        //primary key
        ->join('equipe', 'projet.idEquipe', '=', 'equipe.idEquipe')
        ->select('projet.*', 'equipe.nomEquipe')
        ->get();
    return response()->json([
        'status' => 200,
        'projects' => $team
    ]);
      
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
   
}
public function update(Request $request)
    {
        $project = Project::find($request->idProjet);
            if ($project) {
                $project->idEquipe  =$request->equipe_id;
                $project->nomProjet  = $request->nomProjet;
                  $project->description  = $request->description;
                $project->dateFin = $request->dateFin;
                $project-> priorite = $request->priorite;
                $project-> budget = $request->budget;
                $project->dateDebut = $request->dateDebut;
                $project->responsable = $request->responsable;
                
            
            $project->save();
            return response()->json([
                'status' => 200,
                'message' => 'projet mis à jour avec succès.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'projet non trouvé.'
            ]);
        }
    }


public function delete(Request $request)
{
    $project = Project::find($request->idProjet);
    if ($project && $project->delete()) {
        return response()->json(['status' => 200, 'message' => 'Projet supprimé avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Échec de la suppression du projet.']);
    }
}
      






public function index()
    {
        $equipe = DB::table('equipe')
       ->orderBy('nomEquipe')
       ->get(['idEquipe','nomEquipe']);

        return view('project', ['equipe'=>$equipe]);           
         
    }

}