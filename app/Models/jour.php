<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    protected $table = 'jour';
    protected $primaryKey = 'IdJour';
    protected $fillable = [
        'heureEntree',
        'heureSortie'
    ];
    
}
