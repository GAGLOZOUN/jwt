<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
     protected $fillable = ['name','type','description','matricule'];

}
