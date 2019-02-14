@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary mb-3">
                   <div class="row justify-content-between align-items-center">
                       <div class="col-auto">
                           <h3 class="m-0">Writers</h3>


                       </div>
                       <div class="col-auto">
                           <a class="text-white" href="/dashboard/writers/create">
                               <div class="card-icon">
                                   <i class="material-icons">add</i>
                               </div>
                           </a>
                       </div>
                   </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($writers as $post)
                        <tr>
                            <td class="text-center">{{$post->id}}</td>
                            <td class="text-center">{{$post->name}}</td>
                            <td class="text-center">{{$post->username}}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="/dashboard/writers/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/dashboard/writers/{{$post->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection


