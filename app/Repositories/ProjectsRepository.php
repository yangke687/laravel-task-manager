<?php

namespace App\Repositories;
use App\Project;
use Image;

class ProjectsRepository
{

  public function newProject($request) {

    $request->user()->projects()->create([
        'name' => $request->name,
        'thumbnail' => $this->thumbnail($request),
    ]);
  }

  public function thumbnail($request) {
     if($request->hasFile('thumbnail')) {
      $file = $request->thumbnail;
      $name = str_random(10) . '.jpg';
      $path = public_path() . '/thumbnails/' . $name;
      Image::make($file)->resize(261, 135)->encode('jpg')->save($path);
    }
    return $name;
  }

  public function updateProject($request, $id) {
    $project = Project::findOrFail($id);
    $project->name = $request->name;

    if($request->hasFile('thumbnail')) {
      $project->thumbnail = $this->thumbnail($request);
    }

    $project->save();
  }
}
