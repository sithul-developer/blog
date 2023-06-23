<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function list()
    {
        $categories = Category::where('deleted_at', 0)->latest()->paginate(5);
        return view('category.list', compact('categories'));
    }
    public function add()
    {
        return view('category.add');
    }

    public function insert(Request $request)
    {
        $categories = new Category();
        $categories->fill($request->all());
        $categories->save();
        return redirect('list')->with('success', 'Category created successfully!');
    }


    public function delete(Request $request)
    {
        $categories = $request->input('categories');
        $categories = Category::find($categories);
        $categories->delete();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }
}
