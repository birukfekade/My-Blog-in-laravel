@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <form style="margin: 10px;" class="form-inline" action="/create/todo" method="post">
            {{ csrf_field() }}
            <div class="form-group col-md-10">
                <input type="text" class="form-control" name="todo" required placeholder="Enter a New Todo">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> </button>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Todo</th>
                    <th>Created</th>
                    <th>Completed</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            @foreach($todos as $todo)
            <tbody>
                <tr>
                    <td>{{ $todo->todo }} </td>
                    <td>{{ $todo->created_at }} </td>
                    <td>
                        <div class="switch">
                            <label>
                                @if(!$todo->completed)
                                <a href="{{ route('todo.completed', ['id' => $todo->id]) }}">
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                </a>
                                @elseif($todo->completed)
                                <a href="{{ route('todo.completed', ['id' => $todo->id]) }}">
                                    <input type="checkbox" checked>
                                    <span class="lever"></span>
                                </a>
                                @endif
                            </label>
                        </div>
                    </td>
                    <td><a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    <td><a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>

            </tbody>

            @endforeach

        </table>
    </div>
</div>
<script>
function fun(id){
    var x = document.getElementById(id).style;
    x.textDecoration="strike-through";
}
</script>
@stop()