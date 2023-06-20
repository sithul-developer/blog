<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function list()
    {
        $data[ 'header_title'] = 'Tag ';
        $tags = Tag::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin.tag.list',$data, compact('tags') );
    }
    public function add()
    {
        $data[ 'header_title'] = 'Add Tag ';
        return view('admin.tag.add' ,$data);
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
        $tags = new Tag();
        $tags->fill($request->all());
        $tags->status=0;
        $tags->save();
        return redirect('tags')->with('success', 'Tags created successfully!');
    }
    public function edit($id)
    {
        $data[ 'header_title'] = 'Tags Edit ';
        $tags = Tag::where('Is_deleted', 0)->find($id);
        return view('admin.tag.edit',$data, compact('tags'));
    }
    public function update(Request $request ,$id )
    {
        $tags = Tag::findOrFail($id );
        $tags->tag_name = $request->input('tag_name');
        $tags->slug = $request->input('slug');
        $tags->status= $request->input('status');
        $tags->save();
        return redirect('tags')->with('success', 'Tags update successfully!');
    }


    public function delete(Request $request)
    {
        $tags_id = $request->input('tags_id');
        $tags_id = Tag::find($tags_id);
        $tags_id->Is_deleted=1;
        $tags_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');

    }

}
