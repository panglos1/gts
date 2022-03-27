<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = "requests";

	protected $primaryKey = 'ID';
	
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'phone',
    	'service_id',
    	'message',
    ];

    protected $with = ['service'];
    
    public function service()
    {
        return $this->hasOne(Service::class, 'ID', 'service_id');
    }
}
