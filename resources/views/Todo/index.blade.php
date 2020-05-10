@extends('layouts.app')


@section('content')

    <h1 class="text-center my-5">Todo Page</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>
                <div class="card-body">
                    @foreach($todos as $todo)
                        <ul class="list-group">
                            <li class="list-group-item">
                                {{$todo->name}}
                                @if(!$todo->completed)
                                    <a href="/complete/{{$todo->id}}" style="color:white;"
                                       class="btn btn-warning btn-sm  float-right ">Complete</a>

                                @endif
                                <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                            </li>
                        </ul>

                    @endforeach
                </div>

            </div>

        </div>
    </div>

@endsection