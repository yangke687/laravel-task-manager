<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','project_id','is_completed'];

    public function project() {
    	return $this->belongsTo('App\Project');
    }
}
