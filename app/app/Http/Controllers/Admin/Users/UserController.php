<?php
namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

class UserController extends Controller {

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
    public function index(int $user_id)
    {
        return view('admin/admin');
    }

}