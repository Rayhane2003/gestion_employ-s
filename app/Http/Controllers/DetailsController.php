<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DetailsController extends Controller
{

public function employe(Request $request)
 {
     $employe = DB::table('employe')
           ->where('id', $request->id)
       ->first();
      
     $nom =  $employe->nom ;
     $prenom =   $employe->prénom ;
      $dateNaissance =  $employe->dateNaissance;
     $adresse =    $employe->adresse ;
     $telephone =   $employe->telephone;
     $email =  $employe->email ;
     $poste =  $employe->poste;
     $salaire =  $employe->salaire;
     $dateEmbauche =   $employe->dateEmbauche ;
     $statut =  $employe->statut ;
     $typeContrat = $employe->typeContrat ; 
     $photoProfil = $employe->photoProfil ;
       
        return view('employeeDetails', compact( 'nom',
       'prenom',
     'dateNaissance',
     'adresse',
     'telephone',
     'email',
     'poste',
      'salaire',
      'dateEmbauche',
     'statut',
     'typeContrat',
      'photoProfil'));           
         
    }

public function pointage(Request $request)
    {
        $pointage = DB::table('pointage')
        ->join('employe', 'pointage.id_employe', '=', 'employe.id')
          ->join('jour', 'pointage.idJour', '=', 'jour.idJour')
            ->select('pointage.*','jour.*', 'employe.nom', 'employe.prénom','photoProfil')
           ->where('idPointage', $request->id)
            ->first();
  $photoProfil = $pointage->photoProfil ;    
 $nom =  $pointage->nom ;
 $prenom =   $pointage->prénom ;
$jour =  $pointage->dateJour;
 $heuresortie =    $pointage->heureSortie ;
 $heureentree =   $pointage->heureEntree;
        return view('pointageDétails', compact( 'nom',
 'prenom',
'heureentree',
 'heuresortie',
 'jour','photoProfil'));
              
         
    }
     public function conge(Request $request)
    {
        $conge = DB::table('conge')
          ->join('employe', 'conge.id', '=', 'employe.id')
            ->select('conge.*', 'employe.nom', 'employe.prénom','photoProfil')
           ->where('idConge', $request->id)
    ->first();
  $photoProfil =  $conge->photoProfil ;    
 $nom =   $conge->nom ;
 $prenom =   $conge->prénom ;
$dateFin =  $conge->dateFin;
 $typeConge =    $conge->typeConge ;
  $documentsJustification =     $conge->documentsJustification ;
 $dateDebut =   $conge->dateDebut;
        return view('congeDétails', compact( 'nom',
 'prenom',
'typeConge',
 'dateDebut','documentsJustification',
 'dateFin','photoProfil'));
             
         
    }

 public function rapport(Request $request)
    {
        $rapport = DB::table('rapport')
           ->where('idRapport', $request->id)
       ->first();
 
 $titre =  $rapport->titre ;
 $dateCreation =   $rapport->dateCreation ;
$description =  $rapport->description;
 $contenu =    $rapport->contenu ;

 return view('rapportDétails', compact( 'titre',
 'dateCreation',
'description',
 'contenu'));
    }
     public function equipe(Request $request)
    {
        $equipe = DB::table('equipe')
           ->where('idEquipe', $request->id)
        ->first();
 
 $nomEquipe =  $equipe->nomEquipe ;
 $description =   $equipe->description ;
$dateCreation =  $equipe->dateCreation;
 $responsable =    $equipe->responsable ;
       $adhesion = DB::table('adhesion')
        ->join('employe', 'adhesion.idEquipe', '=', 'employe.id')
          ->join('equipe', 'adhesion.idEquipe', '=', 'equipe.idEquipe')
            ->select('equipe.*', 'employe.nom', 'employe.prénom','photoProfil')
           ->where('adhesion.idEquipe', $request->id)
       ->get();
        return view('equipeDétails',  compact( 'nomEquipe',
 'description',
'dateCreation',
'responsable',
), ['adhesion'=>$adhesion]);           
         
    }
     public function projet(Request $request)
    {
        $projet = DB::table('projet')
          ->join('equipe', 'projet.idEquipe', '=', 'equipe.idEquipe')
            ->select('projet.*', 'nomEquipe')
           ->where('idProjet', $request->id)
       ->first();
 
 $nomProjet =  $projet->nomProjet ;
 $description =   $projet->description ;
$priorite =  $projet->priorite;
 $budget =    $projet->budget ;

 $dateDebut =  $projet->dateDebut ;
 $dateFin =   $projet->dateFin ;
$responsable =  $projet->responsable;
 $nomEquipe =    $projet->nomEquipe ;
 return view('projetDétails', compact( 'nomProjet',
 'description',
'priorite',
'dateDebut',
'nomEquipe',
 'dateFin',
'responsable',
 'budget'));
    }
}
