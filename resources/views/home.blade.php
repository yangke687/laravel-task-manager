@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
     @if(count($projects))
      @foreach($projects as $project)
        <div class="col-4">
          <div class="project-link pos-r" data-url="{{route('projects.show', $project->id)}}">
            <!-- icon btns -->
            <ul class="icon-bar pos-a">
              <li>
                @include('projects._deleteForm')
              </li>
              <!-- edit form modal trigger -->
              <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editFormModal-{{$project->id}}">
                  <i class="fa fa-btn fa-cog"></i>
                </button>
              </li>
            </ul>
            <div class="card mb-4">
              @if($project->thumbnail)
                <img class="card-img-top" src="{{ asset('thumbnails/' . $project->thumbnail) }}" alt="{{$project->name}}">
              @endif
              <div class="card-body">
                <p class="card-text">
                  <h4 class="text-center">
                    <a style="color: inherit; text-decoration: none;" href="{{url('/projects/'.$project->name)}}">
                      {{$project->name}}
                    </a>
                  </h4>
                </p>
              </div>
            </div>
          </div>
          <!-- edit form modal -->
          @include('projects._editForm')
        </div>
      @endforeach
    @endif
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('projects/_createModal')
    </div>
  </div>
</div>
@endsection

@section('custom-js')
<script>
  $(document).ready(function () {
    $('.icon-bar').hide();
    $('.project-link').hover(function(){
      $(this).find('.icon-bar').toggle();
    })
  });
</script>
@endsection
