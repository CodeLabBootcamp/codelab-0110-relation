<?php

namespace App\Http\Controllers;

use App\Post;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::paginate(4);
        $data = [
            "posts" => $posts
        ];
        return view('site.home', $data);
    }

    public function postsByWriter(Writer $writer)
    {
        $posts = $writer->posts()->paginate(4);

        $data = [
            "posts" => $posts
        ];
        return view('site.home', $data);
    }

    public function getPosts(Request $request){
        $term = $request->term;
        $posts = Post::where('title','like',"%$term%")->paginate(4);

        $data = [
            "posts" => $posts
        ];
     return Response::json($data);
    }
}
