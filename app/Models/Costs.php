<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Costs extends Model

{
    protected $table = 'costs'; 
    protected $primaryKey = 'idcosts';
    protected $fillable = ['prix' ,
     'nom',
     'Quantity',
     'date' 
      ]; 
}
