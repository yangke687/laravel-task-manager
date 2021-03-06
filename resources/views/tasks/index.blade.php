@extends('layouts.app')

@section('content')
  <div class="container tasks-tabs">
    <!-- tasks nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="is-not-completed-tab" data-toggle="tab" href="#is-not-completed" role="tab" aria-controls="is-not-completed" aria-selected="true">Is Not Completed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="is-completed-tab" data-toggle="tab" href="#is-completed" role="tab" aria-controls="is-completed" aria-selected="false">Is Completed</a>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane active" id="is-not-completed" role="tabpanel" aria-labelledby="is-not-completed">
        <table class="table table-striped">
          @foreach($todos as $task)
          <tr>
            <td class="first-cell">{{$task->title}}</td>
            <td class="icon-cell">@include('tasks._checkForm')</td>
            <td class="icon-cell">@include('tasks._editForm')</td>
            <td class="icon-cell">@include('tasks._deleteForm')</td>
          </tr>
          @endforeach
        </table>
        {{ $todos->links() }}
      </div>
      <div class="tab-pane" id="is-completed" role="tabpanel" aria-labelledby="is-completed">
        <table class="table table-striped">
          @foreach($dones as $task)
          <tr>
            <td>{{$task->title}}</td>
            <td><span class="badge badge-primary">Ended</span></td>
          </tr>
          @endforeach
        </table>
        {{ $dones->links() }}
      </div>
    </div>
  </div>
@endsection
