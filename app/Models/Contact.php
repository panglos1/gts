<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contacts";

    protected $primaryKey = 'ID';
    
    protected $fillable = [
    	'name',
    	'email',
    	'sujet',
        'service_id',
    	'message'
    ];

    protected $with = ['service'];
    
    public function service()
    {
        return $this->hasOne(Service::class, 'ID', 'service_id');
    }
}
