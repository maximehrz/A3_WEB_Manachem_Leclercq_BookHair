<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coiffeur extends Model
{
    protected $fillable = [
        'id',	'magasin_id',	'nom',	'sexe',
    ];
}
