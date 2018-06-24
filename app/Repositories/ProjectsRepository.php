<?php

namespace App\Repositories;
use Image;

class ProjectsRepository
{

  function newProject($request) {

    if($request->hasFile('thumbnail')) {
      $file = $request->thumbnail;
      $name = str_random(10) . '.jpg';
      $path = public_path() . '/thumbnails/' . $name;
      Image::make($file)->resize(261, 135)->encode('jpg')->save($path);
    }

    $request->user()->projects()->create([
        'name' => $request->name,
        'thumbnail' => isset($name)? $name: null,
    ]);
  }
}
