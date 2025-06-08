<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pointage;
use App\Models\Jour;
class PointageController extends Controller
{
    //This method handles storing a new attendance record (pointage).
    public function store_Pointage(Request $request)
    {
        //Retrieves the maximum existing IdJour from the jour table.
        // If it's null (table is empty), it's set to 0.
        $Max_idJour=1;
        $MaxidJour = DB::table('jour')
        ->max('IdJour');
        $MaxidJour = $MaxidJour ?? 0;

        // Check if a matching jour (entry/exit time) already exists
        //It checks if a day (jour) already exists with the same entry and exit time.
        $idJour = DB::table('jour')
        ->where('heureSortie',$request->heureSortie)
        ->where('heureEntree',$request->heureEntree)
        ->first(['IdJour']);
        // If not found, create a new jour
 if(!$idJour){
    $Max_idJour+= $MaxidJour;
    $JourData = [
        'IdJour' => $Max_idJour,
        'heureSortie' => $request->heureSortie,
        'heureEntree' => $request->heureEntree,
    ];height: 
    Jour::create($JourData);
 }else{
    $Max_idJour=$idJour->IdJour;
 }
 // If not found, create a new jour
        
$dateJour= date('Y-m-d');       
 $PointageData = [
    'Id_employe' => $request->employe_id,
    'dateJour' => $dateJour,
    'idJour' => $Max_idJour,
];
        Pointage::create($PointageData);
        //Return a JSON response
        return response()->json([
            'status' => 200,
        ]);
    }


    public function getall()
    {
        try {
            $leave =  DB::table('pointage')
            ->join('employe', 'pointage.Id_employe', '=', 'employe.id')
            ->join('jour', 'pointage.idJour', '=', 'jour.idJour')
            ->select('pointage.*','heureEntree','heureSortie' ,'employe.nom', 'employe.prénom','photoProfil')
            ->get();
        return response()->json([
            'status' => 200,
            'leaves' => $leave
        ]);
          
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }  
    }

    public function update(Request $request)
    {  $Max_idJour=1;
        $dateJour= date('Y-m-d');    
        $MaxidJour = DB::table('jour')
        ->max('IdJour');
        $MaxidJour = $MaxidJour ?? 0;
        $idJour = DB::table('jour')
        ->where('heureSortie',$request->heureSortie)
        ->where('heureEntree',$request->heureEntree)
        ->first(['IdJour']);
 if(!$idJour){
    $Max_idJour+= $MaxidJour;
    $JourData = [
        'IdJour' => $Max_idJour,
        'heureSortie' => $request->heureSortie,
        'heureEntree' => $request->heureEntree,
    ];
    Jour::create($JourData);
 }else{
    $Max_idJour=$idJour->IdJour;
 }
        $Pointage = Pointage::find($request->id);
        if ($Pointage) {
            $Pointage->Id_employe  =$request->employe_id;
            $Pointage->dateJour  = $dateJour;
            $Pointage->idJour = $Max_idJour;
            $Pointage->save();
            return response()->json([
                'status' => 200,
                'message' => 'Pointage mis à jour avec succès.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Pointage non trouvé.'
            ]);
        }
    }


    public function delete(Request $request)
{
    $Pointage = Pointage::find($request->id);
    if ($Pointage && $Pointage->delete()) {
        return response()->json(['status' => 200, 'message' => 'Pointage supprimé avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Echec de la supression.']);
    }
}
      

    public function index()
    {
        $employe = DB::table('employe')
       ->orderBy('nom')
       ->get(['id','nom','prénom']);

        return view('tracking', ['employe'=>$employe]);           
         
    }

 
}
