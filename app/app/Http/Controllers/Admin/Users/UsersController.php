<?php
namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $access_roles = [
            User::ADMIN,
        ];
        $this->middleware('user.has_role:'.implode(":", $access_roles));
    }

    /**
     * Show admin panel.
     *
     * @return mixed
     */
    public function index()
    {
        $data["title"] = __("Users");
        $data["users"] = User::all()->sortBy("id");
        return view('admin/users', $data);
    }

}
