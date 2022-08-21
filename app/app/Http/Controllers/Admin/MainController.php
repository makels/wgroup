<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminAuth;
use App\Models\Post;
use App\Models\User;

class MainController extends Controller {

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
     * Show admin panel.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data["title"] = __("Dashboard");
        $data["user_count"] = User::query()->count();
        $data["posts_count"] = Post::query()->count();
        $data["posts_to_moderate_count"] = Post::query()->where("status", Post::TO_MODERATE)->count();
        if(auth()->user()->role == User::WRITER) {
            $data["posts_count"] = Post::query()->
                where("author_id", auth()->user()->id)->
                count();
            $data["posts_to_moderate_count"] = Post::query()->
                where("author_id", auth()->user()->id)->
                where("status", Post::TO_MODERATE)->
                count();
        }
        return view('admin/admin', $data);
    }

}
