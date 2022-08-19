<?php
namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminAuth;
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
            User::MODERATOR
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
        return view('admin/admin', $data);
    }

}
