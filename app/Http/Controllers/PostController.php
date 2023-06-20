<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /*=========================End_function_upload_photo_for_CkEdit5============================*/
    public function upload(Request $request)
    {

        if ($request->hasFile('upload')) {
            $originName = optional($request->file('upload'))->getClientOriginalName();
            // $originName =  $request->file('upload'->getClientOriginalName());
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
        /* =================End_function_upload_photo_for_CkEdit5=============t*/
    }

    //

    public function list()
    {
        $data['header_title'] = 'Posts';
        $posts = Post::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin.posts.list', $data, compact('posts'));
    }
    public function add()
    {


        $data['header_title'] = 'Add Post';
        $category = Category::where('status', 0)->get();
        $tags =  Tag::where('status', 0)->get();
        /*  $slides = Slider::where('Is_deleted', 0)->latest()->paginate(5); */
        return view('admin.posts.add', $data, ['category' => $category, 'tags' => $tags] /* compact('slides') */);
    }
    public function insert(Request $request)
    {

        /*    $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
        ]); */
        $posts = new Post();
        $posts->user_id = auth()->id();
        $posts->title = $request->input('title');
        $posts->sub_title = $request->input('sub_title');
        $posts->content = $request->input('content');
        $posts->orders = $request->input('orders');
        $posts->option = $request->input('option');
        $posts->category_id = $request->input('category_id');

        if (!empty($request->file('image'))) {
            if (!empty($posts->getImage())) {
                unlink('media/' . $posts->image);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('media/', $filename);
            $posts->image = $filename;
        }
        $posts->save();
        $posts->tags()->sync($request->tag);
        return redirect('posts')->with('success', 'Posts created successfully!');
        /* dd($request->all()); */
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            //code...
            /*    $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
        ]); */
            $posts = Post::findOrFail($id);
            $posts->user_id = auth()->id();
            $posts->title = $request->input('title');
            $posts->sub_title = $request->input('sub_title');
            $posts->content = $request->input('content');
            $posts->orders = $request->input('orders');
            $posts->option = $request->input('option');
            $posts->category_id = $request->input('category_id');

            if (!empty($request->file('image'))) {
                if (!empty($posts->getImage())) {
                    unlink('media/' . $posts->image);
                }

                $ext = $request->file('image')->getClientOriginalExtension();
                $file = $request->file('image');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
                $file->move('media/', $filename);
                $posts->image = $filename;
            }
            $posts->save();
            $posts->tags()->sync($request->tags);
            DB::commit();
            return redirect('posts')->with('success', 'Update created successfully!');
            /* dd($request->all()); */
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            throw $th;
        }
    }

    public function edit($id)
    {
        $data['header_title'] = 'Slider Edit ';
        $category = Category::where('status', 0)->get();
        $tag = Tag::where('status', 0)->get();
        $posts = Post::where('Is_deleted', 0)->find($id);
        return view('admin.posts.edit', $data, ['posts' => $posts, 'category' => $category, 'tag' => $tag]);
    }


    public function delete(Request $request)
    {
        $posts = $request->input('posts_id');
        $posts = Post::find($posts);
        $posts->Is_deleted = 1;
        $posts->save();
        return redirect()->back()->with('success', 'Slider is delete successfully!');
    }
}
