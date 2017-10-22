<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = [
        'id',	'magasin_id	', 'nom',	'coef_temps','desc',

    ];
}
