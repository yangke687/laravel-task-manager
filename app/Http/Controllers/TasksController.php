<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use \App\Task;
use Redirect;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $todos = Auth::user()->tasks()->where('is_completed', 0)->paginate(10);
      $dones = Auth::user()->tasks()->where('is_completed', 1)->paginate(10);
      $projects = Auth::user()->projects()->pluck('name', 'id'); // column, key

      return view('tasks.index', compact('todos','dones','projects'));
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
    public function store(CreateTaskRequest $request)
    {
      Task::create([
        'title' => $request->new_title,
        'project_id' => $request->project,
        'is_completed' => false,
      ]);

      return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(EditTaskRequest $request, $id)
    {
      $task = Task::findOrFail($id);
      $task->title = $request->title;
      $task->project_id = $request->parent_project;
      $task->save();

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
      $task = Task::findOrFail($id);
      $task->delete();

      return Redirect::back();
    }

    public function check($id) {
      $task = Task::findOrFail($id);
      $task->is_completed = true;
      $task->save();
      return Redirect::back();
    }
}
