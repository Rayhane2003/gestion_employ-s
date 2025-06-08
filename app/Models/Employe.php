<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model

{
    protected $table = 'employe'; 
    protected $primaryKey = 'id';
    protected $fillable = ['prénom' ,
     'nom',
     'dateNaissance',
     'email',
     'telephone' ,
     'adresse',
     'poste',
     'salaire' ,
     'dateEmbauche',
     'statut',
     'typeContrat',
     'photoProfil'
       
      ]; 
}
