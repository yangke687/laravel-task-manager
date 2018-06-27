@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
     @if(count($projects))
      @foreach($projects as $project)
        <div class="col-4">
          <a class="project-link pos-r" href="{{route('projects.show', $project->id)}}">
            <!-- icon btns -->
            <ul class="icon-bar pos-a">
              <li><i class="fa fa-btn fa-close"></i></li>
              <li><i class="fa fa-btn fa-cog"></i></li>
            </ul>
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
