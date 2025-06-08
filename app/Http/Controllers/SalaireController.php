<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Team;



class SalaireController extends Controller
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

public function index(Request $request)
    {
        $dateFin=$request->dateFin;
         $dateDebut=$request->dateDebut;
        $salaire = DB::table('pointage')
          ->join('employe', 'pointage.id_employe', '=', 'employe.id')
           ->join('jour', 'pointage.idJour', '=', 'jour.idJour')
             ->leftjoin('Conge', 'Conge.id', '=', 'employe.id')
            ->selectRaw('SUM(TIMESTAMPDIFF(MINUTE, `heureEntree`, `heureSortie`)) / 60 AS presence,
            CONCAT(employe.nom, " ", employe.prénom) AS nom,
              employe.prénom,
              salaire,SUM(DATEDIFF(`dateFin`, `dateDebut`))  AS date_conge')
       ->whereBetween('pointage.dateJour', [$dateDebut, $dateFin])
      ->groupBy('employe.nom','employe.prénom','employe.salaire')
    ->orderBy('employe.nom')
    ->orderBy('employe.prénom')
    ->get();
     if ($request->ajax()) {
    return response()->json([
        'status' => 200,
        'salaire' => $salaire
    ]);
}
        return view('salaire', ['salaire' => $salaire]);      
    }





}