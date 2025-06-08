<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    protected $table = 'pointage';
    protected $primaryKey = 'idPointage';
    protected $fillable = [
        'Id_employe',
        'dateJour',
        'idJour',
        
    ];
    
}
