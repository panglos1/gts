<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

	protected $primaryKey = 'ID';
	
    protected $fillable = [
    	'title',
    	'address',
    	'image'
    ];

    protected $appends = [
    	'images'
    ];

    public function getImagesAttribute() {
    	return (array) explode(',', $this->image);
    }
}
