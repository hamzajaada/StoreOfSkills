<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // les element que l'en peut utiliser
    protected $fillable=['id','user_id','buyer_id','offre_id','statut'];
}
