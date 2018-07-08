<!-- modal trigger -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#task-edit-form-{{$task->id}}">
  <i class="fa fa-cog"></i>
</button>

<!-- modal -->
<div class="modal fade" id="task-edit-form-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-label-{{$task->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label-{{$task->id}}">Update Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!!Form::model($task, [ 'route' => ['tasks.update', $task->id], 'method' => 'PATCH' ])!!}
        <!-- task title -->
        <div class="form-group">
          {!!Form::label('title', 'Task Descriptions', ['class' => 'control-label'])!!}
          {!!Form::text('title', null, ['class' => 'form-control'])!!}
        </div>
        <!-- task parent project -->
        <div class="form-group">
          {!!Form::label('parent_project', 'Parent Projects List', ['class' => 'control-label'])!!}
          {!!Form::select('parent_project', $projects, null, ['class' => 'form-control'])!!}
        </div>
        @if($errors->has('title'))
          <ul class="alert alert-danger">
            @foreach($errors->get('title') as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!!Form::submit('Save Changes', [ 'class' => 'btn btn-primary' ])!!}
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
