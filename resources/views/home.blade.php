@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
     @if(count($projects))
      @foreach($projects as $project)
        <div class="col-4">
          <a class="project-link" href="{{route('projects.show', $project->id)}}">
            <div class="card mb-4">
              @if($project->thumbnail)
                <img class="card-img-top" src="{{ asset('thumbnails/' . $project->thumbnail) }}" alt="{{$project->name}}">
              @endif
              <div class="card-body">
                <p class="card-text">
                  <h4 class="text-center">{{$project->name}}</h4>
                </p>
              </div>
            </div>
          </a>
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
