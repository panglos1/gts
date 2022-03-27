<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'client_id',
        'document'
    ];

    public function client () {
        return $this->belongsTo(Client::class);
    }
}
