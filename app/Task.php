<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Task extends Model
{
    use FormAccessible;

    protected $fillable = ['title','project_id','is_completed'];

    public function project() {
    	return $this->belongsTo('App\Project');
    }

    public function getParentProjectAttribute() {
      return $this->project->id;
    }
}
