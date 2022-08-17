<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MainController extends Controller {

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
        $data["title"] = __("Dashboard");
        return view('admin/admin', $data);
    }

}
