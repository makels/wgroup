<?php
namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminAuth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(int $user_id)
    {
        $user = User::where('id', $user_id)->first();
        $data["title"] = $user->name;
        $data["user"] = $user;
        return view('admin/user', $data);
    }

    public function save(Request $request) {
        $user_data = $request->post("user_data", null);
        if(!is_null($user_data)) {
            if(!empty('birthday')) {
                $user_data['birthday'] = date('Y-m-d', strtotime($user_data['birthday']));
            }
            if(!empty($user_data['password'])) {
                $user_data['password'] = Hash::make($user_data['password']);
            } else {
                unset($user_data['password']);
            }

            $user = User::find($user_data["id"]);
            $user->update($user_data);
        }
        return redirect(route('users'));
    }

}
