@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard/posts" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{old('title')}}" name="title" type="text" class="form-control" id="title"
                                   placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input value="{{old('image')}}" name="image" type="text" class="form-control" id="image"
                                   placeholder="Enter image">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="writer_id">Writer</label>
                            <select class="form-control" name="writer_id" data-style="btn btn-link" id="writer_id">
                                @foreach($writers as $writer)
                                    <option value="{{$writer->id}}">{{$writer->name}}</option>
                                @endforeach
                            </select>
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