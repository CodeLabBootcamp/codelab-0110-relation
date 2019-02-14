<?php

namespace App\Http\Controllers;

use App\Post;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $data = [
            "posts" => $posts
        ];
        return view('dashboard.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $writers = Writer::all();
        $data = [
            "writers" => $writers
        ];
        return view('dashboard.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "title" => "required",
            "image" => "required",
            "content" => "required",
            "writer_id" => "required|exists:writers,id"
        ];
        $data = $this->validate($request, $rules);

        Post::create($data);
        return Response::redirectTo("/dashboard/posts");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $writers = Writer::all();
        $data = [
            "post" => $post,
            "writers" => $writers
        ];
        return view('dashboard.posts.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            "title" => "required",
            "image" => "required",
            "content" => "required",
            "writer_id" => "required|exists:writers,id"
        ];
        $data = $this->validate($request, $rules);

        $post->update($data);
        return Response::redirectTo("/dashboard/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return Response::redirectTo("/dashboard/posts");

    }
}
