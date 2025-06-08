<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'equipe'; 
    protected $primaryKey = 'idEquipe';
    protected $fillable = [
     'nomEquipe',
     'description',
     'dateCreation',
     'responsable' ,
     
      ]; 
}
