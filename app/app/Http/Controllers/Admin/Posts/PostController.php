<?php
namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

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
     * Show post form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(int $post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $data["post"] = $post;
        return view('admin/post', $data);
    }

    /** Save or create post */
    public function save(Request $request) {
        $post_data = $request->post("post_data", null);
        $request->validate([
            'post_data.title'   => 'required',
            'post_data.body'    => 'required',
        ]);

        if(empty($post_data["id"])) {
            $user = new Post([
                "author_id" => auth()->user()->id,
                "title"     => $post_data["title"],
                "image"     => $post_data["image"],
                "status"    => $post_data["status"],
                "body"      => $post_data["body"],
            ]);
            $user->save();
            return redirect(route('posts'));
        }

        if(!is_null($post_data)) {
            $post = Post::find($post_data["id"]);
            $post->update($post_data);
        }
        return redirect(route('users'));
    }

    /** Show post create form */
    public function create() {
        $data["title"] = __("New Post");
        $data["post"] = new Post();
        return view('admin/post', $data);
    }

    /** Upload main image for post */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:bmp,jpg,jpeg,png,gif|max:4096',
        ]);

        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('upload'), $fileName);

        return response()->json([
            'res' => 0,
            'file' => $fileName
        ]);
    }

}
