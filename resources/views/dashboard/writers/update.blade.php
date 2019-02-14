@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard/writers/{{$post->id}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input  value="{{old('name',$post->name)}}" name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="{{old('username',$post->username)}}" name="username" type="text" class="form-control" id="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input value="{{old('age',$post->age)}}" name="age" type="text" class="form-control" id="age" placeholder="Enter age">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection