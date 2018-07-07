 {!!Form::open(['route' => [ 'tasks.store', 'project' => $project->id ], 'class' => 'form-inline'])!!}
      {!!Form::text('title', null, ['placeholder' => 'Some Task Description', 'class' => 'form-control'])!!}
      <button type="submit" class="btn btn-success">
        <i class="fa fa-plus"></i>
      </button>
    {!!Form::close()!!}
