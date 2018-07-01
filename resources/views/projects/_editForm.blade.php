<!-- Modal -->
<div class="modal fade" id="editFormModal-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="editFormLabel-{{$project->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFormLabel-{{$project->id}}">Edit Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!!Form::model($project, ['route' => [ 'projects.update', $project->id ], 'method' => 'PATCH', 'files' => true])!!}
      <div class="modal-body">
        <div class="form-group">
          {!!Form::label('name','Project Name', ['class' => 'control-label'])!!}
          {!!Form::text('name', null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
          {!!Form::label('thumbnail','Project Thumbnail', ['class' => 'control-label'])!!}
          {!!Form::file('thumbnail', ['class' => 'form-control'])!!}
        </div>
      </div>
      @include('errors/_errors')
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!!Form::submit('Save Changes', ['class' => 'btn btn-primary'])!!}
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
