<?php

namespace App\Http\Controllers;

use App\Post;
use App\Writer;
use Illuminate\Http\Request;

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
}
