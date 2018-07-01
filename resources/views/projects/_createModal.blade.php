<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createFormModal">
  <i class="fa fa-btn fa-plus"> Create New Project</i>
</button>

<!-- Modal -->
<div class="modal fade" id="createFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!!Form::open(['route' => 'projects.store', 'method' => 'POST', 'files' => true])!!}
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
        {!!Form::submit('Create Project', ['class' => 'btn btn-primary'])!!}
      </div>
       {!!Form::close()!!}
    </div>
  </div>
</div>
<!-- end of modal -->
