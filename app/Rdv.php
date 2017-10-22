<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $fillable = [
        'id', 'client_id', 'magasin_id', 'date_debut', 'date_fin','client_nom','magasin_nom'
    ];
}
