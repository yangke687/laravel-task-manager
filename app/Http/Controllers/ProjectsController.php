<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Project;
use Redirect;
use Auth;

class ProjectsController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo) {
      $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
      $this->repo->newProject($request);
      return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
      $project = Auth::user()->projects()->where('name', $name)->first();
      $todos = $project->tasks()->where('is_completed', 0)->get();
      $dones = $project->tasks()->where('is_completed', 1)->get();
      return view('projects.show', compact('project', 'todos', 'dones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, $id)
    {
        $this->repo->updateProject($request, $id);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return Redirect::back();
    }
}
