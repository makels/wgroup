<?php
namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index($post_id) {
        $post = Post::query()->where('id', $post_id)->first();
        if($post->status !== Post::PUBLISHED ||
            (auth()->guest() && $post->type == Post::PRIVATE)) {
            return redirect(route('blog'));
        }

        if(auth()->guest() && $post->type == Post::PRIVATE) {
            return redirect('blog');
        }

        $data['post'] = $post;
        return view('post', $data);
    }
}
