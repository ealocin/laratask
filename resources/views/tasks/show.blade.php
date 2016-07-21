@extends('layouts.app')

@section('content')
<h3>{{ $task->name }}</h3>
<hr>

@if (count($task->subtasks) > 0)
    <form action="/task/{{ $task->id }}" method="post" class="pull-right">
        {!! csrf_field() !!}
        {!! method_field('delete') !!}
        <button type="submit" class="btn btn-sm btn-danger">
            Delete task and all subtasks
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </form>
    <div class="clearfix"></div>
    <br>
    <ul class="list-group">
        @foreach($task->subtasks as $subtask)
            <li class="list-group-item">
                <form action="/subtask/{{ $subtask->id }}" method="post" class="pull-right">
                    {!! csrf_field() !!}
                    {!! method_field('delete') !!}
                    <button class="btn btn-sm btn-danger">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </form>
                <p>{{ $subtask->name }}</p>
                <small class="text-muted">{{ $subtask->description }}</small>
            </li>
        @endforeach
    </ul>
@else
    <div class="alert alert-info text-center">
        <h4>There are no subtasks yet!</h4>
    </div>
@endif

<div class="panel panel-success">
    <div class="panel-heading">Add new subtask</div>
    <div class="panel-body">
        <form action="/subtask" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="_task_id" value="{{ $task->id }}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Subtask name:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">Subtask description:</label>
                <textarea name="description" id="descrption" rows="3" class="form-control">{{ old('description') }}</textarea>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary pull-right" value="Save subtask">
            </div>
        </form>
    </div>
</div>
@stop