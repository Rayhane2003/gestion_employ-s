<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'rapport'; 
    protected $primaryKey = 'idRapport';
    protected $fillable = [
     'titre',
     'dateCreation',
     'description',
     'contenu' ,
     
      ]; 
}
