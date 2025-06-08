<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projet'; 
    protected $primaryKey = 'idProjet';
    protected $fillable = [
      'idEquipe',
     'nomProjet',
     'description',
     'priorite',
     'budget' ,
     'dateDebut',
     'dateFin',
     'responsable' ,
       
      ]; 
      // Relationship with Project model
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'idEquipe', 'equipe_id');
    }
}
