<?php
namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;

class PostsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show admin panel.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(int $post_id)
    {
        return view('admin/admin');
    }

}
