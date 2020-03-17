@extends('layouts.appStar')

@section('content')

<div class="card-body">
    @include('index')

    <form action="{{ url('task') }}" method="post" class="form-horizontal">
        <div class="row">
            <div class="form-group">
                <label for="Task" class="col-sm-3">Task</label>

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">Add task</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@if(count($tasks) > 0)
    <div class="card">
        <div class="card-heading">
            Current tasks
        </div>
        <div class="card-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Task</th>
                <th>Task</th>
                </thead>

                <tbody>
                    @foreach($tasks as $task)
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 @endif
 @endsection


