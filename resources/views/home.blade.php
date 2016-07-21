@extends('layouts.app')

@section('content')
<div class="panel panel-info">
    <div class="panel-heading">Tasks list</div>
    <div class="panel-body">
        <div class="list-group">
            @foreach($tasks as $task)
                <a href="/task/{{ $task->id }}" class="list-group-item">
                    <span class="badge">{{ count($task->subtasks) }}</span>
                    {{ $task->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>

<div class="text-center">
    {!! $tasks->render() !!}
</div>

<div class="panel panel-success">
    <div class="panel-heading">Add new task</div>
    <div class="panel-body">
        <form action="/task" method="post">
            {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Task name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary pull-right" value="Save task">
            </div>
        </form>
    </div>
</div>
@endsection
