<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'conge';
    protected $primaryKey = 'idConge';
    protected $fillable = [
        'id',
        'typeConge',
        'dateDebut',
        'dateFin',
        'documentsJustification',
        'statut'
    ];

    // Relationship with Employe model
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'id', 'employe_id');
    }
}
