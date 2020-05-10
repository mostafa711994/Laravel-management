@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Create Todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Create new todo
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-item">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @endif
                    <form action="/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Enter todo's name" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea  cols="5" rows="5" name="description" placeholder="Enter todo's description"  class="form-control"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit">Create</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection