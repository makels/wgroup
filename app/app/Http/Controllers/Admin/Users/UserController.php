<?php
namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

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
        $user = User::where('id', $user_id)->first();
        $data["title"] = __('User: ') . $user->name;
        $data["user"] = $user;
        return view('admin/user', $data);
    }

}
