<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\adhesion;
use App\Models\Leave;
class EmployeController extends Controller
{
   function store_data(Request $request){
    $photoProfil = $request->file('photoProfil');
        $photoProf="";
        if($photoProfil!=null){
            $photoProf  =  $photoProfil->getClientOriginalName();
           
            $photoProfil->move(public_path('image'), $photoProf);
        }
      $empData = [
         'nom' => $request->nom,
         'email' => $request->email,
         'adresse' => $request->adresse,
         'prénom' => $request->prénom,
         'dateNaissance' => $request->dateNaissance,
         'telephone' => $request->telephone,
         'poste' => $request->poste,
         'salaire' => $request->salaire,
         'dateEmbauche' => $request->dateEmbauche,
         'statut' => $request->statut,
         'typeContrat' => $request->typeContrat,
         'photoProfil' => $photoProf
     ];
     Employe::create($empData);
     return response()->json([
         'status' => 200,
     ]);
 }
function addequipe(Request $request){
 
      $empData = [
         'idEmploye' => $request->idEmploye ,
         'idEquipe' => $request->idProjet,
        
     ];
     adhesion::create($empData);
     return response()->json([
         'status' => 200,
     ]);
 }
   public function getall()
    {
        try {
            $employe = Employe::all();
        return response()->json([
            'status' => 200,
            'employees' => $employe
        ]);
          
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
       
    }

 

    public function update(Request $request)
    {
        $employe = Employe::find($request->id);
        if ($employe) {
            $employe->nom  = $request->nom;
            $employe->email = $request->email;
            $employe-> adresse = $request->adresse;
            $employe-> prénom = $request->prénom;
            $employe->dateNaissance = $request->dateNaissance;
            $employe->telephone = $request->telephone;
             $employe->poste = $request->poste;
            $employe->salaire = $request->salaire;
            $employe-> dateEmbauche = $request->dateEmbauche;
            $employe->statut = $request->statut;
             $employe->typeContrat = $request->typeContrat;
             $photoProfil = $request->file('photoProfil');
           
             if($photoProfil!=null){
                 $photoProf  =  $photoProfil->getClientOriginalName();
                 $employe-> photoProfil =$photoProf ;
                 $photoProfil->move(public_path('image'), $photoProf);
             }
           
            $employe->save();

            return response()->json([
                'status' => 200,
                'message' => 'employé a été mis à jour avec succès'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Employé non trouvé'
            ]);
        }
    }

    public function delete(Request $request)
{
    $Conge = Leave::where('id', $request->id)->first();
   
    if ($Conge && $Conge->delete()) {   
    $Employe = Employe::find($request->id);

    if ($Employe && $Employe->delete()) {
        return response()->json(['status' => 200, 'message' => 'employé a été supprimé avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Échec de la suppression.']);
    }
}else {
    return response()->json(['status' => 400, 'message' => 'Échec de la suppression.']);
}
}
 public function index()
    {
        $equipe = DB::table('equipe')
       ->orderBy('nomEquipe')
       ->get(['idEquipe','nomEquipe']);
        return view('employee', ['equipe'=>$equipe]);           
         
    }


}