<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function store_leave(Request $request)
    {$document_justification = $request->file('document_justification');
        $document_justifi="";
        if($document_justification!=null){
            $document_justifi  =  $document_justification->getClientOriginalName();
            $document_justification->move(public_path('image'), $document_justifi);
        }
        $leaveData = [
            'typeConge' => $request->type_conge,
            'dateDebut' => $request->date_debut,
            'dateFin' => $request->date_fin,
            
            'documentsJustification' => $document_justifi,
            'id' => $request->employe_id

        ];
        Leave::create($leaveData);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function getall()
    {
        try {
            $leave =  DB::table('conge')
            ->join('employe', 'conge.id', '=', 'employe.id')
            ->select('conge.*', 'employe.nom', 'employe.prénom','photoProfil')
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
    {
        $leave = Leave::find($request->id);
        if ($leave) {
            $leave->id  =$request->employe_id;
            $leave->typeConge  = $request->type_conge;
            $leave->dateDebut = $request->date_debut;
            $leave-> dateFin = $request->date_fin;
            $document_justification = $request->file('document_justification');
           
            if($document_justification!=null){
                $document_justifi  =  $document_justification->getClientOriginalName();
                $leave-> documentsJustification =$document_justifi ;
                $document_justification->move(public_path('image'), $document_justifi);
            }
            
            $leave->save();
            return response()->json([
                'status' => 200,
                'message' => 'Congé mis à jour avec succès'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Congé non trouvé'
            ]);
        }
    }

    public function delete(Request $request)
{
    $Conge = Leave::find($request->id);
    if ($Conge && $Conge->delete()) {
        return response()->json(['status' => 200, 'message' => 'Conge supprimé avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Échec de supprimer le Conge.']);
    }
}
      

    public function index()
    {
        $employe = DB::table('employe')
       ->orderBy('nom')
       ->get(['id','nom','prénom']);

        return view('leave', ['employe'=>$employe]);           
         
    }
}
