<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;



class ReportController extends Controller
{
    function store_report(Request $request){
       
          $reportData = [
             'titre' => $request->titre,
             'dateCreation' => $request->dateCreation,
             'description' => $request->description,
             'contenu' => $request->contenu,
             
         ];
         Report::create($reportData);
         return response()->json([
             'status' => 200,
         ]);
}

public function getall()
    {
        try {
            $rapport = Report::all();
        return response()->json([
            'status' => 200,
            'reports' => $rapport
        ]);
          
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
       

    }

    public function update(Request $request)
    {
        $rapport = Report::find($request->id);
        if ($rapport) {
            $rapport->titre  = $request->titre;
            $rapport->dateCreation = $request->dateCreation;
            $rapport-> description = $request->description;
            $rapport-> contenu = $request->contenu;
           
           
            
            $rapport->save();

            return response()->json([
                'status' => 200,
                'message' => 'Rapport mis à jour avec succès.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Rapport non trouvé'
            ]);
        }
    }

        public function delete(Request $request)
    {
        $rapport = Report::find($request->id);
        if ($rapport && $rapport->delete()) {
            return response()->json(['status' => 200, 'message' => 'rapport supprimé avec succès.']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Échec de la suppression du rapport.']);
        }
    }
          


}