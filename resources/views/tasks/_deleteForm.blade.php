{!!Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'DELETE' ])!!}
  <button type="submit" class="btn btn-sm btn-danger">
    <i class="fa fa-close"></i>
  </button>
{!!Form::close()!!}
