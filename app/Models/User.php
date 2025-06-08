<?php

   namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{



    protected $table = 'User'; 
    protected $primaryKey = 'id';
    protected $fillable = [
     'nom',
     'mot_passe',

      ]; 
}
