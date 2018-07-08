@if($errors->has('new_title'))
  <ul class="alert alert-danger">
    @foreach($errors->get('new_title') as $err)
      <li>{{ $err }}</li>
    @endforeach
  </ul>
@endif
 {!!Form::open(['route' => [ 'tasks.store', 'project' => $project->id ], 'class' => 'form-inline'])!!}
      {!!Form::text('new_title', null, ['placeholder' => 'Some Task Description', 'class' => 'form-control'])!!}
      <button type="submit" class="btn btn-success">
        <i class="fa fa-plus"></i>
      </button>
    {!!Form::close()!!}
