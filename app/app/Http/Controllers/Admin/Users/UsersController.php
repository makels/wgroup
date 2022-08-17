<?php
namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

class UsersController extends Controller {

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
    public function index()
    {
        $data["title"] = __("Users");
        return view('admin/users', $data);
    }

}
