<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::query()->where('status', Post::PUBLISHED)->
            where('block', 0);
        if(auth()->guest()) {
            $posts->where("type", Post::PUBLIC);
        }
        $data['posts'] = $posts->get()->sortBy('updated_at');
        return view('home', $data);
    }
}
