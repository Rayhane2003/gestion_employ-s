<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model

{
    protected $table = 'budget'; 
    protected $primaryKey = 'idbudget';
    protected $fillable = ['budget' ,
     'date'
      ]; 
}
