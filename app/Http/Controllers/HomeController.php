<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    /* ================= Start Controller users =============t*/
    public function home( Request $request)
    {
        $data['header_title'] = 'Home Blog';
        $posts = Post::when($request->category_id, function ($query, $category_id) {
            $query->where('category_id', $category_id);
        })
        ->when($request->tag_id, function ($query, $tag_id) {
            $query->whereHas('tags', function ($sub_query) use($tag_id) {
                $sub_query->where('id', $tag_id);
            });
        })->latest()->paginate(10);
        return view('home.App', $data, ['posts'=>$posts] );
    }

    public function  Article($id)

    {
        $data['header_title'] = 'Article';
        $article = Post::findOrFail($id);
        return view('home.Article', $data, ['article'=>$article] );
    }

    /* ================= End Controller users =============t*/



    /*  Route::get('/', function () {
        $data['header_title'] = 'Login';
        return view('home.app', $data);
    }); */
}
