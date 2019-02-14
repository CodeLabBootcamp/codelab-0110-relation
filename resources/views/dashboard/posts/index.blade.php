@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary mb-3">
                   <div class="row justify-content-between align-items-center">
                       <div class="col-auto">
                           <h3 class="m-0">Posts</h3>


                       </div>
                       <div class="col-auto">
                           <a class="text-white" href="/dashboard/posts/create">
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
                        <th class="text-center">Title</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="text-center">{{$post->id}}</td>
                            <td class="text-center">{{$post->title}}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="/dashboard/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/dashboard/posts/{{$post->id}}" method="post">
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