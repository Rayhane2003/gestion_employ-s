<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class adhesion extends Model

{
    protected $table = 'adhesion'; 
    protected $primaryKey = 'idTravail';
    protected $fillable = [
     'idEmploye',
     'idEquipe'
      ]; 
}
