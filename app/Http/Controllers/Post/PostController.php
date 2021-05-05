<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    public function index(Request $request)
    {
        $posts = PostService::getInstance()->getItems();

//        dd($posts);
        return view('post.list', compact('posts'));
    }

    public function showDetail(Request $request)
    {
        return view('post.detail');
    }
}
