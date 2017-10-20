<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    protected $fillable = [
        'nom', 'cp', 'id','adresse','gerant_id','logo',
    ];
}
