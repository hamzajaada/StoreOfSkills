<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offre extends Model
{
    use HasFactory;
    use SoftDeletes;
    // les champs que l'on peut utiliser de la table offres
    protected $fillable=['type','categorie','offre','image_offre','prix'];

    public static function find(mixed $id)
    {
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
