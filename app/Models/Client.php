<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fichier;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'information',
        'email',
        'pass'
    ];

    public function fichiers ()
    {
        return $this->hasMany(Fichier::class);
    }
}
