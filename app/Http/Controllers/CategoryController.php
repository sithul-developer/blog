<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function list()
    {
        $data[ 'header_title'] = 'Category ';
        $categories =   Category::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin.category.list',$data, compact('categories') );
    }
    public function add()
    {
        $data[ 'header_title'] = 'Category Add ';
        return view('admin.category.add' ,$data);
    }

    public function insert(Request $request)
    {
       /*  $validated = $request->validate(
            ['category_name' => 'required|unique:categories|max:255|min:4'],
            [
                'category_name.required' => 'Please input category name ',
                'category_name.min' => 'Category name be 4 letters ',
                'category_name.unique' => 'Category name input existing ',

            ]
        ); */
        $categories = new Category();
        $categories->fill($request->all());
        $categories->save();
        return redirect('category')->with('success', 'Category created successfully!');
    }
    public function edit($id)
    {
        $data[ 'header_title'] = 'Category Edit ';
        $categories = Category::where('Is_deleted', 0)->find($id);
        return view('admin.category.edit',$data, compact('categories'));
    }
    public function update(Request $request ,$id )
    {
        $categories = Category::findOrFail($id );
        $categories->category_name = $request->input('category_name');
        $categories->description = $request->input('description');
        $categories->slug = $request->input('slug');
        $categories->status = $request->input('status');
        $categories->save();
        return redirect('category')->with('success', 'Category update successfully!');
    }
    public function delete(Request $request)
    {

        $category_id = $request->input('categories');
        $category_id = Category::find($category_id);
        $category_id->Is_deleted=1;
        $category_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }
}
