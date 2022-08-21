<?php
namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $access_roles = [
            User::ADMIN,
            User::MODERATOR,
            User::WRITER
        ];
        $this->middleware('user.has_role:'.implode(":", $access_roles));
    }

    /**
     * Show Posts list
     * @return mixed
     */
    public function index()
    {
        $data["title"] = __("Posts");
        if(auth()->user()->role === User::WRITER) {
            $data["posts"] = Post::query()->where('author_id', auth()->user()->id)->get()->sortBy("updated_at");
        } else {
            $data["posts"] = Post::all()->sortBy("updated_at");
        }

        return view('admin/posts', $data);
    }

}
