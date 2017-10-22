<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv_tache extends Model
{
    protected $fillable = [
        'id',	'rdv_id', 'tache_id', 'rdv-id','tache_nom'
    ];
}
